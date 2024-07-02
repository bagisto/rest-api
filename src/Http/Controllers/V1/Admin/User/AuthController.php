<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\User;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\UserResource;
use Webkul\User\Repositories\AdminRepository;

class AuthController extends UserController
{
    use SendsPasswordResetEmails;

    /**
     * Login user.
     */
    public function login(Request $request, AdminRepository $adminRepository): Response
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            $request->validate(['device_name' => 'required']);

            $admin = $adminRepository->where('email', $request->email)->first();

            if (
                ! $admin
                || ! Hash::check($request->password, $admin->password)
            ) {
                throw ValidationException::withMessages([
                    'email' => trans('rest-api::app.admin.account.error.credential-error'),
                ]);
            }
            /**
             * Preventing multiple token creation.
             */
            $admin->tokens()->delete();

            return response([
                'data'    => new UserResource($admin),
                'message' => trans('rest-api::app.admin.account.logged-in-success'),
                'token'   => $admin->createToken($request->device_name, ['role:admin'])->plainTextToken,
            ]);
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return response([
                'data'    => new UserResource($this->resolveAdminUser($request)),
                'message' => trans('rest-api::app.admin.account.logged-in-success'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.admin.account.error.invalid'),
        ], 401);
    }

    /**
     * Logout user.
     */
    public function logout(Request $request): Response
    {
        $admin = $this->resolveAdminUser($request);

        ! EnsureFrontendRequestsAreStateful::fromFrontend($request)
            ? $admin->tokens()->delete()
            : auth()->guard('admin')->logout();

        return response([
            'message' => trans('rest-api::app.admin.account.logged-out-success'),
        ]);
    }

    /**
     * Send forgot password link.
     */
    public function forgotPassword(Request $request): Response
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::broker('admins')->sendResetLink($request->only('email'));

        return response(
            ['message' => __($response)],
            $response == Password::RESET_LINK_SENT ? 200 : 400
        );
    }
}

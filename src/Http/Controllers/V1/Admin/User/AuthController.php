<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\User;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\UserResource;
use Webkul\User\Repositories\AdminRepository;

class AuthController extends UserController
{
    use SendsPasswordResetEmails;

    /**
     * Login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Webkul\User\Repositories\AdminRepository  $adminRepository
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, AdminRepository $adminRepository)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            $request->validate([
                'device_name' => 'required',
            ]);

            $admin = $adminRepository->where('email', $request->email)->first();

            if (! $admin || ! Hash::check($request->password, $admin->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            /**
             * Preventing multiple token creation.
             */
            $admin->tokens()->delete();

            return response([
                'data'    => new UserResource($admin),
                'message' => 'Logged in successfully.',
                'token'   => $admin->createToken($request->device_name, ['role:admin'])->plainTextToken,
            ]);
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return response([
                'data'    => new UserResource($this->resolveAdminUser($request)),
                'message' => 'Logged in successfully.',
            ]);
        }

        return response([
            'message' => 'Invalid Email or Password',
        ], 401);
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $admin = $this->resolveAdminUser($request);

        ! EnsureFrontendRequestsAreStateful::fromFrontend($request)
            ? $admin->tokens()->delete()
            : auth()->guard('admin')->logout();

        return response([
            'message' => 'Logged out successfully.',
        ]);
    }

    /**
     * Send forgot password link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::broker('admins')->sendResetLink($request->only('email'));

        return response(
            ['message' => __($response)],
            $response == Password::RESET_LINK_SENT ? 200 : 400
        );
    }
}

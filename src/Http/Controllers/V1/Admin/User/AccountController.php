<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\UserResource;

class AccountController extends UserController
{
    /**
     * Get the details for current logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $admin = $this->resolveAdminUser($request);

        return new UserResource($admin);
    }

    /**
     * Update the details for current logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $this->resolveAdminUser($request);

        $isPasswordChanged = false;

        $data = $request->validate([
            'name'             => 'required',
            'email'            => 'email|unique:users,email,'.$user->id,
            'password'         => 'nullable|min:6|confirmed',
            'current_password' => 'nullable|required|min:6',
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            return response([
                'message' => trans('rest-api::app.admin.account.error.password-mismatch'),
            ], 400);
        }

        if (isset($data['password'])) {
            $isPasswordChanged = true;

            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        if ($isPasswordChanged) {
            Event::dispatch('user.admin.update-password', $user);
        }

        return response([
            'data'    => new UserResource($user),
            'message' => trans('rest-api::app.admin.account.update-success'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Support\Str;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\UserResource;
use Webkul\User\Http\Requests\UserForm;
use Webkul\User\Repositories\AdminRepository;

class UserController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return AdminRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return UserResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Webkul\User\Http\Requests\UserForm  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserForm $request)
    {
        $data = $request->all();

        if (isset($data['password']) && $data['password']) {
            $data['password'] = bcrypt($data['password']);
            $data['api_token'] = Str::random(80);
        }

        $admin = $this->getRepositoryInstance()->create($data);

        return response([
            'user'    => new UserResource($admin),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'User']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\User\Http\Requests\UserForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserForm $request, $id)
    {
        $data = $this->prepareUserData($request, $id);

        if ($data instanceof \Illuminate\Http\Response) {
            return $data;
        }

        $admin = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'user'    => new UserResource($admin),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'User']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => __('rest-api::app.common-response.error.last-item-delete', ['name' => 'admin']),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Admin']),
        ]);
    }

    /**
     * Prepare user data.
     *
     * @param  \Webkul\User\Http\Requests\UserForm  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\RedirectResponse
     */
    private function prepareUserData(UserForm $request, $id)
    {
        $data = $request->validated();

        $user = $this->getRepositoryInstance()->findOrFail($id);

        /**
         * Password check.
         */
        if (! $data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        /**
         * Is user with `permission_type` all changed status.
         */
        $data['status'] = isset($data['status']) ? 1 : 0;

        $isStatusChangedToInactive = (int) $data['status'] === 0 && (int) $user->status === 1;

        if ($isStatusChangedToInactive && $this->getRepositoryInstance()->countAdminsWithAllAccessAndActiveStatus() === 1) {
            return $this->cannotChangeRedirectResponse('status');
        }

        /**
         * Is user with `permission_type` all role changed.
         */
        $isRoleChanged = $user->role->permission_type === 'all'
        && isset($data['role_id'])
        && (int) $data['role_id'] !== $user->role_id;

        if ($isRoleChanged && $this->getRepositoryInstance()->countAdminsWithAllAccess() === 1) {
            return $this->cannotChangeRedirectResponse('role');
        }

        return $data;
    }

    /**
     * Cannot change redirect response.
     *
     * @param  string $columnName
     * @return \Illuminate\Http\Response
     */
    private function cannotChangeRedirectResponse(string $columnName)
    {
        return response([
            'message' => __('rest-api::app.common-response.error.cannot-change-column', ['name' => $columnName]),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\RoleResource;
use Webkul\User\Repositories\AdminRepository;
use Webkul\User\Repositories\RoleRepository;

class RoleController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return RoleRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return RoleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => ['required', 'in:all,custom'],
            'description'     => 'required',
        ]);

        Event::dispatch('user.role.create.before');

        $data = $request->only([
            'name',
            'description',
            'permission_type',
            'permissions',
        ]);

        $role = $this->getRepositoryInstance()->create($data);

        Event::dispatch('user.role.create.after', $role);

        return response([
            'data'    => new RoleResource($role),
            'message' => trans('rest-api::app.admin.settings.roles.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminRepository $adminRepository, int $id): Response
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => 'required|in:all,custom',
            'description'     => 'required',
        ]);

        /**
         * Check for other admins if the role has been changed from all to custom.
         */
        $isChangedFromAll = $request->permission_type == 'custom' && $this->getRepositoryInstance()->find($id)->permission_type == 'all';

        if (
            $isChangedFromAll
            && $adminRepository->countAdminsWithAllAccess() === 1
        ) {
            return response([
                'message' => trans('rest-api::app.admin.settings.roles.error.being-used'),
            ], 400);
        }

        Event::dispatch('user.role.update.before', $id);

        $role = $this->getRepositoryInstance()->update(array_merge($request->only([
            'name',
            'description',
            'permission_type',
        ]), [
            'permissions' => $request->has('permissions') ? $request->permissions : [],
        ]), $id);

        Event::dispatch('user.role.update.after', $role);

        return response([
            'data'    => new RoleResource($role),
            'message' => trans('rest-api::app.admin.settings.roles.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $role = $this->getRepositoryInstance()->findOrFail($id);

        if ($role->admins->isNotEmpty()) {
            return response([
                'message' => trans('rest-api::app.admin.settings.roles.error.being-used'),
            ], 400);
        }

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.roles.error.last-item-delete'),
            ], 400);
        }

        Event::dispatch('user.role.delete.before', $id);

        $role->delete();

        Event::dispatch('user.role.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.roles.delete-success'),

        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\RoleResource;
use Webkul\User\Repositories\AdminRepository;
use Webkul\User\Repositories\RoleRepository;

class RoleController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return RoleRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return RoleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => ['required', 'in:all,custom'],
            'description'     => 'required',
        ]);

        Event::dispatch('user.role.create.before');

        $role = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('user.role.create.after', $role);

        return response([
            'data'    => new RoleResource($role),
            'message' => trans('rest-api::app.admin.settings.roles.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminRepository $adminRepository, $id)
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => ['required', 'in:all,custom'],
            'description'     => 'required',
        ]);

        $params = $request->all();

        /**
         * Check for other admins if the role has been changed from all to custom.
         */
        $isChangedFromAll = $params['permission_type'] == 'custom' && $this->getRepositoryInstance()->find($id)->permission_type == 'all';

        if ($isChangedFromAll && $adminRepository->countAdminsWithAllAccess() === 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.roles.error.being-used'),
            ], 400);
        }

        Event::dispatch('user.role.update.before', $id);

        $role = $this->getRepositoryInstance()->update($params, $id);

        Event::dispatch('user.role.update.after', $role);

        return response([
            'data'    => new RoleResource($role),
            'message' => trans('rest-api::app.admin.settings.roles.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->getRepositoryInstance()->findOrFail($id);

        if ($role->admins->count() >= 1) {
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

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('user.role.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.roles.delete-success'),

        ]);
    }
}

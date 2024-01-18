<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\RoleResource;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => ['required','in:all,custom'],
            'description'     => 'required',
        ]);

        $role = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new RoleResource($role),
            'message' => trans('rest-api::app.admin.settings.roles.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\User\Repositories\AdminRepository  $adminRepository
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminRepository $adminRepository, $id)
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => ['required','in:all,custom'],
            'description'     =>  'required',
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

        $role = $this->getRepositoryInstance()->update($params, $id);

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

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.admin.settings.roles.delete-success'),

        ]);
    }
}

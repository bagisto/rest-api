<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\User\Repositories\AdminRepository;
use Webkul\User\Repositories\RoleRepository;

class RoleController extends SettingController
{
    /**
     * Role repository instance.
     *
     * @var \Webkul\User\Repositories\RoleRepository
     */
    protected $roleRepository;

    /**
     * Admin repository instance.
     *
     * @var \Webkul\User\Repositories\AdminRepository
     */
    protected $adminRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\User\Repositories\AdminRepository  $adminRepository
     * @param  \Webkul\User\Repositories\RoleRepository  $roleRepository
     * @return void
     */
    public function __construct(
        RoleRepository $roleRepository,
        AdminRepository $adminRepository
    ) {
        $this->roleRepository = $roleRepository;

        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->all();

        return response([
            'data' => $roles,
        ]);
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
            'permission_type' => 'required',
        ]);

        Event::dispatch('user.role.create.before');

        $role = $this->roleRepository->create($request->all());

        Event::dispatch('user.role.create.after', $role);

        return response([
            'data'    => $role,
            'message' => __('admin::app.response.create-success', ['name' => 'Role']),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findOrFail($id);

        return response([
            'data' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required',
            'permission_type' => 'required',
        ]);

        $params = $request->all();

        /**
         * Check for other admins if the role has been changed from all to custom.
         */
        $isChangedFromAll = $params['permission_type'] == 'custom' && $this->roleRepository->find($id)->permission_type == 'all';

        if ($isChangedFromAll && $this->adminRepository->countAdminsWithAllAccess() === 1) {
            return response([
                'message' => __('admin::app.response.being-used', ['name' => 'Role', 'source' => 'Admin User']),
            ], 400);
        }

        Event::dispatch('user.role.update.before', $id);

        $role = $this->roleRepository->update($params, $id);

        Event::dispatch('user.role.update.after', $role);

        return response([
            'data'    => $role,
            'message' => __('admin::app.response.update-success', ['name' => 'Role']),
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
        $role = $this->roleRepository->findOrFail($id);

        if ($role->admins->count() >= 1) {
            return response([
                'message' => __('admin::app.response.being-used', ['name' => 'Role', 'source' => 'Admin User']),
            ], 400);
        }

        if ($this->roleRepository->count() == 1) {
            return response([
                'message' => __('admin::app.response.last-delete-error', ['name' => 'Role']),
            ], 400);
        }

        try {
            Event::dispatch('user.role.delete.before', $id);

            $this->roleRepository->delete($id);

            Event::dispatch('user.role.delete.after', $id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Role']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Role']),
        ], 400);
    }
}

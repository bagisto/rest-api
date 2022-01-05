<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Webkul\User\Http\Requests\UserForm;
use Webkul\User\Repositories\AdminRepository;
use Webkul\User\Repositories\RoleRepository;

class UserController extends SettingController
{
    /**
     * Admin repository instance.
     *
     * @var \Webkul\User\Repositories\AdminRepository
     */
    protected $adminRepository;

    /**
     * Role repository instance.
     *
     * @var \Webkul\User\Repositories\RoleRepository
     */
    protected $roleRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\User\Repositories\AdminRepository  $adminRepository
     * @param  \Webkul\User\Repositories\RoleRepository  $roleRepository
     * @return void
     */
    public function __construct(
        AdminRepository $adminRepository,
        RoleRepository $roleRepository
    ) {
        $this->adminRepository = $adminRepository;

        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->adminRepository->all();

        return response([
            'data' => $admins,
        ]);
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

        Event::dispatch('user.admin.create.before');

        $admin = $this->adminRepository->create($data);

        Event::dispatch('user.admin.create.after', $admin);

        return response([
            'user'    => $admin,
            'message' => trans('admin::app.response.create-success', ['name' => 'User']),
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
        $admin = $this->adminRepository->findOrFail($id);

        return response([
            'data' => $admin,
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

        Event::dispatch('user.admin.update.before', $id);

        $admin = $this->adminRepository->update($data, $id);

        if (isset($data['password']) && $data['password']) {
            Event::dispatch('user.admin.update-password', $admin);
        }

        Event::dispatch('user.admin.update.after', $admin);

        return response([
            'user'    => $admin,
            'message' => trans('admin::app.response.update-success', ['name' => 'User']),
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
        $this->adminRepository->findOrFail($id);

        if ($this->adminRepository->count() == 1) {
            return response([
                'message' => trans('admin::app.response.last-delete-error', ['name' => 'Admin']),
            ], 400);
        }

        try {
            Event::dispatch('user.admin.delete.before', $id);

            $this->adminRepository->delete($id);

            Event::dispatch('user.admin.delete.after', $id);

            return response([
                'message' => trans('admin::app.response.delete-success', ['name' => 'Admin']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Admin']),
        ], 400);
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

        $user = $this->adminRepository->find($id);

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

        if ($isStatusChangedToInactive && $this->adminRepository->countAdminsWithAllAccessAndActiveStatus() === 1) {
            return $this->cannotChangeRedirectResponse('status');
        }

        /**
         * Is user with `permission_type` all role changed.
         */
        $isRoleChanged = $user->role->permission_type === 'all'
        && isset($data['role_id'])
        && (int) $data['role_id'] !== $user->role_id;

        if ($isRoleChanged && $this->adminRepository->countAdminsWithAllAccess() === 1) {
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
            'message' => trans('admin::app.response.cannot-change', ['name' => $columnName]),
        ]);
    }
}

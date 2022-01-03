<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerGroupRepository;

class CustomerGroupController extends CustomerBaseController
{
    /**
     * Customer group repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerGroupRepository
     */
    protected $customerGroupRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository;
     * @return void
     */
    public function __construct(CustomerGroupRepository $customerGroupRepository)
    {
        $this->customerGroupRepository = $customerGroupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerGroups = $this->customerGroupRepository->all();

        return response([
            'data' => $customerGroups,
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
            'code' => ['required', 'unique:customer_groups,code', new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        $data = $request->all();

        $data['is_user_defined'] = 1;

        Event::dispatch('customer.customer_group.create.before');

        $customerGroup = $this->customerGroupRepository->create($data);

        Event::dispatch('customer.customer_group.create.after', $customerGroup);

        return response([
            'data'    => $customerGroup,
            'message' => trans('admin::app.response.create-success', ['name' => 'Customer Group']),
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
        $group = $this->customerGroupRepository->findOrFail($id);

        return response([
            'data' => $group,
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
            'code' => ['required', 'unique:customer_groups,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        Event::dispatch('customer.customer_group.update.before', $id);

        $customerGroup = $this->customerGroupRepository->update($request->all(), $id);

        Event::dispatch('customer.customer_group.update.after', $customerGroup);

        return response([
            'message' => trans('admin::app.response.update-success', ['name' => 'Customer Group']),
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
        $customerGroup = $this->customerGroupRepository->findOrFail($id);

        if ($customerGroup->is_user_defined == 0) {
            return response([
                'message' => trans('admin::app.customers.customers.group-default'),
            ], 400);
        }

        if (count($customerGroup->customers) > 0) {
            return response([
                'message' => trans('admin::app.response.customer-associate', ['name' => 'Customer Group']),
            ], 400);
        }

        try {
            Event::dispatch('customer.customer_group.delete.before', $id);

            $this->customerGroupRepository->delete($id);

            Event::dispatch('customer.customer_group.delete.after', $id);

            return response([
                'message' => trans('admin::app.response.delete-success', ['name' => 'Customer Group']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Customer Group']),
        ], 400);
    }
}

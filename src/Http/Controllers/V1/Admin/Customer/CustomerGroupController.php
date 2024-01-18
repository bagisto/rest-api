<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerGroupResource;

class CustomerGroupController extends CustomerBaseController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CustomerGroupRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CustomerGroupResource::class;
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
            'code' => ['required', 'unique:customer_groups,code', new Code],
            'name' => 'required',
        ]);

        $data = $request->all();

        $data['is_user_defined'] = 1;

        Event::dispatch('customer.customer_group.create.before');

        $customerGroup = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.customer_group.create.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => trans('rest-api::app.admin.customers.groups.create-success'),
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
            'code' => ['required', 'unique:customer_groups,code,' . $id, new Code],
            'name' => 'required',
        ]);

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('customer.customer_group.update.before', $id);

        $customerGroup = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('customer.customer_group.update.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => trans('rest-api::app.admin.customers.groups.update-success'),
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
        $customerGroup = $this->getRepositoryInstance()->findOrFail($id);

        if ($customerGroup->is_user_defined == 0) {
            return response([
                'message' => trans('rest-api::app.admin.customers.groups.error.default-group-delete'),
            ], 400);
        }

        if (count($customerGroup->customers) > 0) {
            return response([
                'message' => trans('rest-api::appadmin.customers.groups.error.being-used'),
            ], 400);
        }

        Event::dispatch('customer.customer_group.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('customer.customer_group.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.customers.groups.delete-success'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerGroupRepository;
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
            'code' => ['required', 'unique:customer_groups,code', new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        $data = $request->all();

        $data['is_user_defined'] = 1;

        Event::dispatch('customer.customer_group.create.before');

        $customerGroup = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.customer_group.create.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Customer group']),
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

        $this->getRepositoryInstance()->findOrFail($id);

        $customerGroup = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('customer.customer_group.update.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Customer group']),
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
                'message' => __('rest-api::app.common-response.error.default-group-delete'),
            ], 400);
        }

        if (count($customerGroup->customers) > 0) {
            return response([
                'message' => __('rest-api::app.common-response.error.being-used', ['name' => 'Customer group', 'source' => 'customer']),
            ], 400);
        }

        Event::dispatch('customer.customer_group.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('customer.customer_group.delete.after', $id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Customer group']),
        ]);
    }
}

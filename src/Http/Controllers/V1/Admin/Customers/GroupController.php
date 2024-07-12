<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Rules\Code;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerGroupResource;

class GroupController extends BaseController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CustomerGroupRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CustomerGroupResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): Response
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:customer_groups,code', new Code],
            'name' => 'required',
        ]);

        Event::dispatch('customer.customer_group.create.before');

        $customerGroup = $this->getRepositoryInstance()->create(request()->only([
            'code',
            'name',
        ]), [
            'is_user_defined' => 1,
        ]);

        Event::dispatch('customer.customer_group.create.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => trans('rest-api::app.admin.customers.groups.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id): Response
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:customer_groups,code,'.$id, new Code],
            'name' => 'required',
        ]);

        $customerGroup = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('customer.customer_group.update.before', $id);

        $customerGroup->update(request()->only([
            'code',
            'name',
        ]));

        Event::dispatch('customer.customer_group.update.after', $customerGroup);

        return response([
            'data'    => new CustomerGroupResource($customerGroup),
            'message' => trans('rest-api::app.admin.customers.groups.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $customerGroup = $this->getRepositoryInstance()->findOrFail($id);

        if (! $customerGroup->is_user_defined) {
            return response([
                'message' => trans('rest-api::app.admin.customers.groups.error.default-group-delete'),
            ], 400);
        }

        if ($customerGroup->customers->count()) {
            return response([
                'message' => trans('rest-api::app.admin.customers.groups.error.being-used'),
            ], 400);
        }

        Event::dispatch('customer.customer_group.delete.before', $id);

        $customerGroup->delete();

        Event::dispatch('customer.customer_group.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.customers.groups.delete-success'),
        ]);
    }
}

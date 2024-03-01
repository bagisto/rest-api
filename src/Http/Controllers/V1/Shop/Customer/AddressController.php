<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerAddressResource;
use Webkul\Shop\Http\Requests\Customer\AddressRequest;

class AddressController extends CustomerController
{
    /**
     * Repository class name.
     */
    public function repository():string
    {
        return CustomerAddressRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CustomerAddressResource::class;
    }

    /**
     * Store address.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AddressRequest $request)
    {
        $customer = $this->resolveShopUser($request);

        Event::dispatch('customer.addresses.create.before');

        $data = array_merge($request->only([
            'company_name',
            'first_name',
            'last_name',
            'vat_id',
            'address1',
            'country',
            'state',
            'city',
            'postcode',
            'phone',
            'default_address',
        ]), [
            'customer_id' => $customer->id,
            'address1'    => implode(PHP_EOL, array_filter($request->input('address1'))),
            'address2'    => implode(PHP_EOL, array_filter($request->input('address2', []))),
        ]);

        $customerAddress = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.addresses.create.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customer.addresses.create-success'),
        ]);
    }

    /**
     * Update address.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AddressRequest $request, int $id)
    {
        $customer = $this->resolveShopUser($request);

        $data = array_merge(request()->only([
            'customer_id',
            'company_name',
            'vat_id',
            'first_name',
            'last_name',
            'address1',
            'city',
            'country',
            'state',
            'postcode',
            'phone',
            'default_address',
        ]), [
            'address1' => implode(PHP_EOL, array_filter(request()->input('address1'))),
            'address2' => implode(PHP_EOL, array_filter(request()->input('address2', []))),
        ]);

        Event::dispatch('customer.addresses.update.before', $id);

        $customerAddress = $customer->addresses()->findOrFail($id);

        $customerAddress->update($data);

        Event::dispatch('customer.addresses.update.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customer.addresses.update-success'),
        ]);
    }

    /**
     * Delete customer address.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $customer = $this->resolveShopUser($request);

        Event::dispatch('customer.addresses.delete.before', $id);

        $customerAddress = $customer->addresses()->findOrFail($id);

        $customerAddress->delete();

        Event::dispatch('customer.addresses.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.shop.customer.addresses.delete-success'),
        ]);
    }
}

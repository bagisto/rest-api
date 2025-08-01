<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerAddressResource;
use Webkul\Shop\Http\Requests\Customer\AddressRequest;

class AddressController extends CustomerController
{
    /**
     * Repository class name.
     */
    public function repository(): string
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
     */
    public function store(AddressRequest $request): Response
    {
        $customer = $this->resolveShopUser($request);

        Event::dispatch('customer.addresses.create.before');

        $data = array_merge($request->only([
            'company_name',
            'first_name',
            'last_name',
            'vat_id',
            'address',
            'country',
            'state',
            'city',
            'postcode',
            'phone',
            'email',
            'default_address',
        ]), [
            'customer_id' => $customer->id,
            'address'     => implode(PHP_EOL, array_filter($request->input('address'))),
        ]);

        if (! empty($data['default_address'])) {
            $this->getRepositoryInstance()->where('customer_id', $data['customer_id'])
                ->where('default_address', 1)
                ->update(['default_address' => 0]);
        }

        $customerAddress = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.addresses.create.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customer.addresses.create-success'),
        ]);
    }

    /**
     * Update address.
     */
    public function update(AddressRequest $request, int $id): Response
    {
        $customer = $this->resolveShopUser($request);

        Event::dispatch('customer.addresses.update.before', $id);

        $customerAddress = $customer->addresses()->findOrFail($id);

        $customerAddress->update(array_merge(request()->only([
            'customer_id',
            'company_name',
            'first_name',
            'last_name',
            'vat_id',
            'address',
            'country',
            'state',
            'city',
            'postcode',
            'phone',
            'email',
            'default_address',
        ]), [
            'address' => implode(PHP_EOL, array_filter($request->input('address'))),
        ]));

        Event::dispatch('customer.addresses.update.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customer.addresses.update-success'),
        ]);
    }

    /**
     * Delete customer address.
     */
    public function destroy(Request $request, int $id): Response
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

    /**
     * To change the default address or make the default address,
     * by default when first address is created will be the default address.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeDefault(Request $request, int $id)
    {
        $customer = $this->resolveShopUser($request);

        $defaultAddress = $customer->addresses()->where('default_address', 1)->first();

        $addressToSetDefault = $customer->addresses()->find($id);

        if ($defaultAddress && $defaultAddress->id !== $id) {
            $defaultAddress->update(['default_address' => 0]);
        }

        if ($addressToSetDefault) {
            $addressToSetDefault->update(['default_address' => 1]);
        } else {
            return response([
                'message' => trans('rest-api::app.shop.customer.addresses.default-delete'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.shop.customer.addresses.default-success'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\Customer\Http\Requests\CustomerAddressRequest;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerAddressResource;

class AddressController extends CustomerController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CustomerAddressRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CustomerAddressResource::class;
    }

    /**
     * Customer address repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerAddressRepository
     */
    protected $customerAddressRepository;

    /**
     * Store address.
     *
     * @param  \Webkul\Customer\Http\Requests\CustomerAddressRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerAddressRequest $request)
    {
        $data = $request->all();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));
        $data['customer_id'] = $this->resolveShopUser($request)->id;

        $customerAddress = $this->customerAddressRepository->create($data);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => __('rest-api::app.address.created'),
        ]);
    }

    /**
     * Show the specific adress.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $id)
    {
        $customerAddress = $this->resolveShopUser($request)->addresses()->find($id);

        return response([
            'data' => new CustomerAddressResource($customerAddress),
        ]);
    }

    /**
     * Update address.
     *
     * @param  \Webkul\Customer\Http\Requests\CustomerAddressRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CustomerAddressRequest $request, int $id)
    {
        $data = $request->all();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));

        $customerAddress = $this->customerAddressRepository->update($data, $id);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => __('rest-api::app.address.created'),
        ]);
    }

    /**
     * Delete customer address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $customerAddress = $this->resolveShopUser($request)->addresses()->find($id);

        $customerAddress->delete();

        return response([
            'message' => __('rest-api::app.address.removed'),
        ]);
    }
}

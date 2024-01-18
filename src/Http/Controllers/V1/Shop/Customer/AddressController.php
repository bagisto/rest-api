<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\Shop\Http\Requests\Customer\AddressRequest;
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
     * @param  \Webkul\Shop\Http\Requests\Customer\AddressRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AddressRequest $request)
    {
        $data = $request->all();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));
        $data['customer_id'] = $this->resolveShopUser($request)->id;

        $customerAddress = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customers.addresses.create-success'),
        ]);
    }

    /**
     * Update address.
     *
     * @param  \Webkul\Shop\Http\Requests\Customer\AddressRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AddressRequest $request, int $id)
    {
        $data = $request->all();
        
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));

        $customerAddress = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.shop.customers.addresses.upadte-success'),
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
            'message' => trans('rest-api::app.shop.customers.addresses.delete-success'),
        ]);
    }
}

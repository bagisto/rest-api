<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Illuminate\Http\Request;
use Webkul\Customer\Http\Requests\CustomerAddressRequest;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\RestApi\Http\Resources\V1\Customer\CustomerAddress;

class CustomerAddressController extends Controller
{
    /**
     * Customer address repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerAddressRepository
     */
    protected $customerAddressRepository;

    /**
     * Controller instance.
     *
     * @param  CustomerAddressRepository  $customerAddressRepository
     * @return void
     */
    public function __construct(CustomerAddressRepository $customerAddressRepository)
    {
        $this->customerAddressRepository = $customerAddressRepository;
    }

    /**
     * Get customer addresses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = $request->user();

        $addresses = $customer->addresses()->get();

        return response([
            'data' => CustomerAddress::collection($addresses),
        ]);
    }

    /**
     * Store address.
     *
     * @param  \Webkul\Customer\Http\Requests\CustomerAddressRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerAddressRequest $request)
    {
        $data = $request->validated();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));
        $data['customer_id'] = $request->user()->id;

        $customerAddress = $this->customerAddressRepository->create($data);

        return response([
            'data'    => new CustomerAddress($customerAddress),
            'message' => 'Your address has been created successfully.',
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
        $customerAddress = $request->user()->addresses()->find($id);

        return response([
            'data' => new CustomerAddress($customerAddress),
        ]);
    }

    /**
     * Update address.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CustomerAddressRequest $request, int $id)
    {
        $data = $request->validated();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));

        $customerAddress = $this->customerAddressRepository->update($data, $id);

        return response([
            'data'    => new CustomerAddress($customerAddress),
            'message' => 'Your address has been updated successfully.',
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
        $customerAddress = $request->user()->addresses()->find($id);

        $customerAddress->delete();

        return response([
            'message' => 'Item removed successfully.',
        ]);
    }
}

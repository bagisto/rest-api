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

        return response()->json([
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

        return response()->json([
            'message' => 'Your address has been created successfully.',
            'data'    => new CustomerAddress($customerAddress),
        ]);
    }

    /**
     * Show the specific adress.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        $customerAddress = $request->user()->addresses()->find($id);

        return response()->json([
            'data' => new CustomerAddress($customerAddress),
        ]);
    }

    /**
     * Update address.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, CustomerAddressRequest $request)
    {
        $data = $request->validated();
        $data['address1'] = implode(PHP_EOL, array_filter($data['address1']));

        $customerAddress = $this->customerAddressRepository->update($data, $id);

        return response()->json([
            'message' => 'Your address has been updated successfully.',
            'data'    => new CustomerAddress($customerAddress),
        ]);
    }

    /**
     * Delete customer address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $customerAddress = $request->user()->addresses()->find($id);

        $customerAddress->delete();

        return response()->json([
            'message' => 'Item removed successfully.',
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Illuminate\Http\Request;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\RestApi\Http\Resources\V1\Customer\CustomerAddress as CustomerAddressResource;

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
     */
    public function __construct(CustomerAddressRepository $customerAddressRepository)
    {
        $this->customerAddressRepository = $customerAddressRepository;
    }

    /**
     * Get customer addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = $request->user();

        $addresses = $customer->addresses()->get();

        return response()->json([
            'data' => CustomerAddressResource::collection($addresses)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $customer = auth($this->guard)->user();

        if (request()->input('address1') && ! is_array(request()->input('address1'))) {
            return response()->json([
                'message' => 'address1 must be an array.',
            ]);
        }

        if (request()->input('address1')) {
            request()->merge([
                'address1' => implode(PHP_EOL, array_filter(request()->input('address1'))),
                'customer_id' => $customer->id,
            ]);
        }

        $this->validate(request(), [
            'address1' => 'string|required',
            'company' => 'string|nullable',
            'vat_id' => 'string|nullable',
            'country' => 'string|required',
            'state' => 'string|nullable',
            'city' => 'string|required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);

        $customerAddress = $this->customerAddressRepository->create(request()->all());

        return response()->json([
            'message' => 'Your address has been created successfully.',
            'data'    => new CustomerAddressResource($customerAddress),
        ]);
    }

    public function show()
    {
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(int $id)
    {
        if (request()->input('address1') && ! is_array(request()->input('address1'))) {
            return response()->json([
                'message' => 'address1 must be an array.',
            ]);
        }

        request()->merge(['address1' => implode(PHP_EOL, array_filter(request()->input('address1')))]);

        $this->validate(request(), [
            'address1' => 'string|required',
            'company' => 'string|nullable',
            'vat_id' => 'string|nullable',
            'country' => 'string|required',
            'state' => 'string|nullable',
            'city' => 'string|required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);

        $customerAddress = $this->customerAddressRepository->update(request()->all(), $id);

        return response()->json([
            'message' => 'Your address has been updated successfully.',
            'data'    => new CustomerAddressResource($customerAddress),
        ]);
    }

    public function destroy()
    {
    }
}

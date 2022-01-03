<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Rules\VatIdRule;

class CustomerAddressController extends CustomerBaseController
{
    /**
     * Customer repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Customer address repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerAddressRepository
     */
    protected $customerAddressRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository         $customerRepository
     * @param  \Webkul\Customer\Repositories\CustomerAddressRepository  $customerAddressRepository
     * @return void
     */
    public function __construct(
        CustomerRepository $customerRepository,
        CustomerAddressRepository $customerAddressRepository
    ) {
        $this->customerRepository = $customerRepository;

        $this->customerAddressRepository = $customerAddressRepository;
    }

    /**
     * Fetch address by customer id.
     *
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function index($customerId)
    {
        $customer = $this->customerRepository->find($customerId);

        return response([
            'data' => $customer->addresses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $customerId)
    {
        $request->merge([
            'address1' => implode(PHP_EOL, array_filter($request->input('address1'))),
        ]);

        $request->validate([
            'company_name' => 'string',
            'address1'     => 'string|required',
            'country'      => 'string|required',
            'state'        => 'string|required',
            'city'         => 'string|required',
            'postcode'     => 'required',
            'phone'        => 'required',
            'vat_id'       => new VatIdRule(),
        ]);

        $data = $request->collect()->except('_token')->toArray();

        if ($this->customerAddressRepository->create($data)) {
            return response([
                'message' => trans('admin::app.customers.addresses.success-create'),
            ]);
        }

        return response([
            'message' => trans('admin::app.customers.addresses.error-create'),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $customerId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customerId, $id)
    {
        $address = $this->customerAddressRepository->find($id);

        return response([
            'data' => $address,
        ]);
    }

    /**
     * Edit's the pre made resource of customer called address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $customerId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId, $id)
    {
        $request->merge(['address1' => implode(PHP_EOL, array_filter($request->input('address1')))]);

        $request->validate([
            'company_name' => 'string',
            'address1'     => 'string|required',
            'country'      => 'string|required',
            'state'        => 'string|required',
            'city'         => 'string|required',
            'postcode'     => 'required',
            'phone'        => 'required',
            'vat_id'       => new VatIdRule(),
        ]);

        $data = $request->collect()->except('_token')->toArray();

        $address = $this->customerAddressRepository->find($id);

        if ($address) {
            $this->customerAddressRepository->update($data, $id);

            return response([
                'message' => trans('admin::app.customers.addresses.success-update'),
            ]);
        }

        return response([
            'message' => 'Address not found.',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $customerId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerId, $id)
    {
        $this->customerAddressRepository->delete($id);

        return response([
            'message' => trans('admin::app.customers.addresses.success-delete'),
        ]);
    }

    /**
     * Mass delete the customer's addresses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request, $customerId)
    {
        $addressIds = explode(',', $request->input('indexes'));

        foreach ($addressIds as $addressId) {
            $this->customerAddressRepository->delete($addressId);
        }

        return response([
            'message' => trans('admin::app.customers.addresses.success-mass-delete'),
        ]);
    }
}

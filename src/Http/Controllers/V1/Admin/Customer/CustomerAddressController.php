<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Rules\VatIdRule;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerAddressResource;

class CustomerAddressController extends CustomerBaseController
{
    /**
     * Customer repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @return void
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        parent::__construct();
        
        $this->customerRepository = $customerRepository;
    }

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
     * Fetch address by customer id.
     *
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function index($customerId)
    {
        $customer = $this->customerRepository->findOrFail($customerId);

        return response([
            'data' => $this->getResourceCollection($customer->addresses),
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
            'customer_id' => $customerId,
            'address1'    => implode(PHP_EOL, array_filter($request->input('address1'))),
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

        $customerAddress = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Customer address']),
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
        $customer = $this->customerRepository->findOrFail($customerId);

        $address = $customer->addresses()->findOrFail($id);

        return response([
            'data' => new CustomerAddressResource($address),
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
        $request->merge([
            'customer_id' => $customerId,
            'address1'    => implode(PHP_EOL, array_filter($request->input('address1'))),
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

        $this->getRepositoryInstance()->findOrFail($id);

        $customerAddress = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Customer address']),
        ]);
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
        $customer = $this->customerRepository->findOrFail($customerId);

        $customer->addresses()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Customer address']),
        ]);
    }

    /**
     * Mass delete the customer's addresses.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request, $customerId)
    {
        foreach ($request->indexes as $addressId) {
            $customer = $this->customerRepository->findOrFail($customerId);

            $customer->addresses()->findOrFail($addressId);

            $this->getRepositoryInstance()->delete($addressId);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'customer addresses']),
        ]);
    }
}

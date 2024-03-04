<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Core\Rules\AlphaNumericSpace;
use Webkul\Core\Rules\PhoneNumber;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Rules\VatIdRule;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerAddressResource;

class AddressController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CustomerRepository $customerRepository)
    {
        parent::__construct();
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, int $customerId)
    {
        $customer = $this->customerRepository->findOrFail($customerId);

        $query = $customer->addresses();

        foreach ($request->except($this->requestException) as $input => $value) {
            $query = $query->whereIn($input, array_map('trim', explode(',', $value)));
        }

        if ($sort = $request->input('sort')) {
            $query = $query->orderBy($sort, $request->input('order') ?? 'desc');
        } else {
            $query = $query->orderBy('id', 'desc');
        }

        if (is_null($request->input('pagination')) || $request->input('pagination')) {
            $results = $query->paginate($request->input('limit') ?? 10);
        } else {
            $results = $query->get();
        }

        return $this->getResourceCollection($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(int $customerId)
    {
        $this->validate(request(), [
            'company_name' => [new AlphaNumericSpace],
            'address1'     => ['required', 'array'],
            'country'      => ['required', new AlphaNumericSpace],
            'state'        => ['required', new AlphaNumericSpace],
            'city'         => ['required', 'string'],
            'postcode'     => ['required', 'numeric'],
            'phone'        => ['required', new PhoneNumber],
            'vat_id'       => [new VatIdRule()],
        ]);

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
            'customer_id' => $customerId,
            'address1'    => implode(PHP_EOL, array_filter(request()->input('address1'))),
            'address2'    => implode(PHP_EOL, array_filter(request()->input('address2', []))),
        ]);

        Event::dispatch('customer.addresses.create.before');

        $customerAddress = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.addresses.create.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.admin.customers.addresses.create-success'),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $customerId, int $id)
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
     * @return \Illuminate\Http\Response
     */
    public function update(int $customerId, int $id)
    {
        $this->validate(request(), [
            'company_name' => [new AlphaNumericSpace],
            'address1'     => ['required', 'array'],
            'country'      => ['required', new AlphaNumericSpace],
            'state'        => ['required', new AlphaNumericSpace],
            'city'         => ['required', 'string'],
            'postcode'     => ['required', 'numeric'],
            'phone'        => ['required', new PhoneNumber],
            'vat_id'       => [new VatIdRule()],
        ]);

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
            'customer_id' => $customerId,
            'address1'    => implode(PHP_EOL, array_filter(request()->input('address1'))),
            'address2'    => implode(PHP_EOL, array_filter(request()->input('address2', []))),
        ]);

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('customer.addresses.update.before', $id);

        $customerAddress = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('customer.addresses.update.after', $customerAddress);

        return response([
            'data'    => new CustomerAddressResource($customerAddress),
            'message' => trans('rest-api::app.admin.customers.addresses.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Event::dispatch('customer.addresses.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('customer.addresses.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.customers.addresses.delete-success'),
        ]);
    }

    /**
     * Mass delete the customer's addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest, int $customerId)
    {
        foreach ($massDestroyRequest->indices as $addressId) {
            $customer = $this->customerRepository->findOrFail($customerId);

            $customer->addresses()->findOrFail($addressId);

            $this->getRepositoryInstance()->delete($addressId);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.addresses.mass-operations.delete-success'),
        ]);
    }
}

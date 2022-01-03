<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Mail;
use Webkul\Admin\Mail\NewCustomerNotification;
use Webkul\Customer\Repositories\CustomerRepository;

class CustomerController extends CustomerBaseController
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
    public function __construct(
        CustomerRepository $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->all();

        return response([
            'data' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|unique:customers,email',
            'date_of_birth' => 'date|before:today',
        ]);

        $data = $request->all();

        $password = rand(100000, 10000000);

        $data['password'] = bcrypt($password);

        $data['is_verified'] = 1;

        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->create($data);

        Event::dispatch('customer.registration.after', $customer);

        try {
            if (core()->getConfigData('emails.general.notifications.emails.general.notifications.customer')) {
                Mail::queue(new NewCustomerNotification($customer, $password));
            }
        } catch (\Exception $e) {}

        return response([
            'data'    => $customer,
            'message' => trans('admin::app.response.create-success', ['name' => 'Customer']),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->findOrFail($id);

        return response([
            'data' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|unique:customers,email,' . $id,
            'date_of_birth' => 'date|before:today',
        ]);

        $data = $request->all();

        $data['status'] = ! isset($data['status']) ? 0 : 1;

        Event::dispatch('customer.update.before');

        $customer = $this->customerRepository->update($data, $id);

        Event::dispatch('customer.update.after', $customer);

        return response([
            'data'    => $customer,
            'message' => trans('admin::app.response.update-success', ['name' => 'Customer']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customerRepository->findorFail($id);

        try {
            if (! $this->customerRepository->checkIfCustomerHasOrderPendingOrProcessing($customer)) {
                $this->customerRepository->delete($id);

                return response(['message' => trans('admin::app.response.delete-success', ['name' => 'Customer'])], 200);
            }

            return response(['message' => trans('admin::app.response.order-pending', ['name' => 'Customer'])], 400);
        } catch (\Exception $e) {}

        return response(['message' => trans('admin::app.response.delete-failed', ['name' => 'Customer'])], 400);
    }

    /**
     * To mass update the customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(Request $request)
    {
        $customerIds = explode(',', $request->input('indexes'));

        $updateOption = $request->input('update-options');

        foreach ($customerIds as $customerId) {
            $customer = $this->customerRepository->find($customerId);

            $customer->update(['status' => $updateOption]);
        }

        return response([
            'message' => trans('admin::app.customers.customers.mass-update-success'),
        ]);
    }

    /**
     * To mass delete the customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $customerIds = explode(',', $request->input('indexes'));

        if (! $this->customerRepository->checkBulkCustomerIfTheyHaveOrderPendingOrProcessing($customerIds)) {

            foreach ($customerIds as $customerId) {
                $this->customerRepository->deleteWhere(['id' => $customerId]);
            }

            return response([
                'message' => trans('admin::app.customers.customers.mass-destroy-success'),
            ]);
        }

        return response(['message' => trans('admin::app.response.order-pending', ['name' => 'Customers'])], 400);
    }

    /**
     * Retrieve all orders from customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orders($id)
    {
        $customer = $this->customerRepository->find($id);

        return response([
            'data' => $customer->all_orders,
        ]);
    }

    /**
     * Retrieve all invoices from customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoices($id)
    {
        $customer = $this->customerRepository->find($id);

        return response([
            'data' => $customer->all_orders,
        ]);
    }

    /**
     * To store the response of the note in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request, $id)
    {
        $request->validate([
            'notes' => 'string|nullable',
        ]);

        $customer = $this->customerRepository->find($id);

        if ($customer && $customer->update(['notes' => $request->input('notes')])) {
            return response([
                'message' => 'Note taken',
            ]);
        }

        return response([
            'message' => 'Note cannot be taken',
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Mail\NewCustomerNotification;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\OrderResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\InvoiceResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;

class CustomerController extends CustomerBaseController
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     * @return void
     */
    public function __construct(protected InvoiceRepository $invoiceRepository)
    {
    }
    
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CustomerRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CustomerResource::class;
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

        $customer = $this->getRepositoryInstance()->create($data);

        try {
            if (core()->getConfigData('emails.general.notifications.emails.general.notifications.customer')) {
                Mail::queue(new NewCustomerNotification($customer, $password));
            }
        } catch (\Exception $e) {}

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.admin.customers.customers.create-success'),
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

        Event::dispatch('customer.update.before', $id);

        $customer = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('customer.update.after', $customer);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.admin.customers.customers.update-success'),
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
        $customer = $this->getRepositoryInstance()->findorFail($id);

        if (! $this->getRepositoryInstance()->checkIfCustomerHasOrderPendingOrProcessing($customer)) {
            $this->getRepositoryInstance()->delete($id);

            return response([
                'message' => trans('rest-api::app.admin.customers.customers.delete-success'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.customers.error.order-pending-account-delete'),
        ], 400);
    }

    /**
     * To mass update the customer.
     *
     * @param  \Webkul\Core\Http\Requests\MassUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $request)
    {
        foreach ($request->indexes as $index) {
            $this->getRepositoryInstance()->findorFail($index);

            Event::dispatch('customer.update.before', $index);

            $this->getRepositoryInstance()->update(['status' => $request->update_value], $index);

            Event::dispatch('customer.update.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.customers.mass-operations.update-success'),
        ]);
    }

    /**
     * To mass delete the customer.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        $customerIds = $request->indexes;

        if (! $this->getRepositoryInstance()->checkBulkCustomerIfTheyHaveOrderPendingOrProcessing($customerIds)) {
            foreach ($customerIds as $customerId) {
                $this->getRepositoryInstance()->findOrFail($customerId);

                Event::dispatch('customer.delete.before', $customerId);

                $this->getRepositoryInstance()->delete($customerId);

                Event::dispatch('customer.delete.after', $customerId);
            }

            return response([
                'message' => trans('rest-api::app.admin.customers.customers.mass-operations.delete-success'),
            ]);
        }

        return response(['message' => trans('rest-api::app.admin.customers.customers.error.order-pending-account-delete')], 400);
    }

    /**
     * Retrieve all orders from customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orders($id)
    { 
        
        $customer = $this->getRepositoryInstance()->findorFail($id);
        return response([
            'data' => OrderResource::collection($customer->orders),
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
        $customer = $this->getRepositoryInstance()->findorFail($id);

        $orderIds = $customer->orders->pluck('id')->toArray();
        
        return response([
            'data' => InvoiceResource::collection($this->invoiceRepository->findWhereIn('order_id', $orderIds)),
        ]);
    }

    /**
     * To store the response of the note in storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request, $id)
    {
        $request->validate([
            'note' => 'string|nullable',
        ]);

        $customer = $this->getRepositoryInstance()->findorFail($id);

        $customerNote = $this->getRepositoryInstance()->create([
            'customer_id'       => $id,
            'note'              => request()->input('note'),
            'customer_notified' => request()->input('customer_notified', 0),
        ]);

        if (request()->has('customer_notified')) {
            Event::dispatch('customer.note-created.after', $customerNote);
        }

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.customers.note-taken'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Core\Rules\PhoneNumber;
use Webkul\Customer\Repositories\CustomerNoteRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\InvoiceResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\OrderResource;
use Webkul\Sales\Repositories\InvoiceRepository;

class CustomerController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected InvoiceRepository $invoiceRepository,
        protected CustomerNoteRepository $customerNoteRepository
    ) {
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|unique:customers,email',
            'date_of_birth' => 'date|before_or_equal:today',
            'phone'         => ['unique:customers,phone', new PhoneNumber],
        ]);

        $password = rand(100000, 10000000);

        $data = array_merge(request()->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'date_of_birth',
            'phone',
            'customer_group_id',
        ]), [
            'password'    => bcrypt($password),
            'is_verified' => 1,
        ]);

        Event::dispatch('customer.registration.before');

        $customer = $this->getRepositoryInstance()->create($data);

        Event::dispatch('customer.registration.after', $customer);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.admin.customers.customers.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|unique:customers,email,'.$id,
            'date_of_birth' => 'date|before_or_equal:today',
            'phone'         => ['unique:customers,phone,'.$id, new PhoneNumber],
        ]);

        $data = array_merge(request()->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'date_of_birth',
            'phone',
            'customer_group_id',
        ]), [
            'status'       => request()->input('status', 0),
            'is_suspended' => request()->input('is_suspended', 0),
        ]);

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
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
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
    public function massUpdate(MassUpdateRequest $massUpdateRequest)
    {
        $selectedCustomerIds = $massUpdateRequest->input('indices');

        foreach ($selectedCustomerIds as $customerId) {
            Event::dispatch('customer.update.before', $customerId);

            $customer = $this->getRepositoryInstance()->update([
                'status' => $massUpdateRequest->input('value'),
            ], $customerId);

            Event::dispatch('customer.update.after', $customer);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.customers.mass-operations.update-success'),
        ]);
    }

    /**
     * To mass delete the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest)
    {
        $customerIds = $massDestroyRequest->input('indices');

        if (! $this->getRepositoryInstance()->checkBulkCustomerIfTheyHaveOrderPendingOrProcessing($customerIds)) {
            foreach ($customerIds as $customerId) {
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
     * @return \Illuminate\Http\Response
     */
    public function orders(int $id)
    {
        $customer = $this->getRepositoryInstance()->findorFail($id);

        return response([
            'data' => OrderResource::collection($customer->orders),
        ]);
    }

    /**
     * Retrieve all invoices from customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoices(int $id)
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
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request, int $id)
    {
        $request->validate([
            'note' => 'string|nullable',
        ]);

        $customer = $this->getRepositoryInstance()->findorFail($id);

        $customerNote = $this->customerNoteRepository->create([
            'customer_id'       => $id,
            'note'              => request()->input('note'),
            'customer_notified' => request()->input('customer_notified', 0),
        ]);

        if (request()->has('customer_notified')) {
            Event::dispatch('customer.note-created.after', $customerNote);
        }

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.admin.customers.customers.notes.note-taken'),
        ]);
    }
}

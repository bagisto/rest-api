<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
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
    ) {}

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CustomerRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CustomerResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|email|unique:customers,email',
            'date_of_birth' => 'date|before_or_equal:today',
            'phone'         => ['unique:customers,phone'],
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
            'channel_id'
        ]), [
            'password'    => bcrypt($password),
            'is_verified' => 1,
            'channel_id'  => core()->getCurrentChannel()->id,
        ]);

        if (empty($data['phone'])) {
            $data['phone'] = null;
        }

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
     */
    public function update(Request $request, int $id): Response
    {
        $request->validate([
            'first_name'    => 'string|required',
            'last_name'     => 'string|required',
            'gender'        => 'required',
            'email'         => 'required|email|unique:customers,email,'.$id,
            'date_of_birth' => 'date|before_or_equal:today',
            'phone'         => ['unique:customers,phone,'.$id],
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

        if (empty($data['phone'])) {
            $data['phone'] = null;
        }

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
     */
    public function destroy(int $id): Response
    {
        $customer = $this->getRepositoryInstance()->findOrFail($id);

        if (! $this->getRepositoryInstance()->haveActiveOrders($customer)) {
            $customer->delete();

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
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): Response
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
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): Response
    {
        $customers = $this->getRepositoryInstance()->findWhereIn('id', $massDestroyRequest->input('indices'));

        try {
            /**
             * Ensure that customers do not have any active orders before performing deletion.
             */
            foreach ($customers as $customer) {
                if ($this->getRepositoryInstance()->haveActiveOrders($customer)) {
                    throw new \Exception(trans('rest-api::app.admin.customers.customers.error.order-pending-account-delete'));
                }
            }

            /**
             * After ensuring that they have no active orders delete the corresponding customer.
             */
            foreach ($customers as $customer) {
                Event::dispatch('customer.delete.before', $customer);

                $this->getRepositoryInstance()->delete($customer->id);

                Event::dispatch('customer.delete.after', $customer);
            }

            return response([
                'message' => trans('rest-api::app.admin.customers.customers.mass-operations.delete-success'),
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * Retrieve all orders from customer.
     */
    public function orders(int $id): Response
    {
        $customer = $this->getRepositoryInstance()->findOrFail($id);

        return response([
            'data' => OrderResource::collection($customer->orders),
        ]);
    }

    /**
     * Retrieve all invoices from customer.
     */
    public function invoices(int $id): Response
    {
        $customer = $this->getRepositoryInstance()->findOrFail($id);

        $orderIds = $customer->orders->pluck('id')->toArray();

        return response([
            'data' => InvoiceResource::collection($this->invoiceRepository->findWhereIn('order_id', $orderIds)),
        ]);
    }

    /**
     * To store the response of the note in storage.
     */
    public function storeNote(Request $request, int $id): Response
    {
        $request->validate([
            'note' => 'string|required',
        ]);

        $customer = $this->getRepositoryInstance()->findorFail($id);

        Event::dispatch('customer.note.create.before', $id);

        $customerNote = $this->customerNoteRepository->create([
            'customer_id'       => $id,
            'note'              => request()->input('note'),
            'customer_notified' => request()->input('customer_notified', 0),
        ]);

        if (request()->has('customer_notified')) {
            Event::dispatch('customer.note-created.after', $customerNote);
        }

        Event::dispatch('customer.note.create.after', $customerNote);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.admin.customers.customers.notes.note-taken'),
        ]);
    }
}

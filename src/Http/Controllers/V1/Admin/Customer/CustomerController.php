<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\OrderResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\InvoiceResource;
use Webkul\Customer\Repositories\CustomerNoteRepository;

class CustomerController extends CustomerBaseController
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     * @return void
     */
    public function __construct(
        protected InvoiceRepository $invoiceRepository,
        protected CustomerNoteRepository $customerNoteRepository
    )
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
            'phone'         => 'nullable|integer',
        ]);

        $data = $request->all();

        $password = rand(100000, 10000000);

        $data['password'] = bcrypt($password);

        $data['is_verified'] = 1;

        $customer = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.common-response.admin.customer.create'),
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

        $data['status'] = ($data['status']) ?? 0;

        $customer = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => trans('rest-api::app.common-response.admin.customer.update'),
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
                'message' => trans('rest-api::app.common-response.admin.customer.delete'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.common-response.admin.customer.error.order-pending-account-delete'),
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
        foreach ($request->indices as $index) {
            $this->getRepositoryInstance()->findorFail($index);

            $this->getRepositoryInstance()->update(['status' => $request->update_value], $index);
        }

        return response([
            'message' => trans('rest-api::app.common-response.admin.customer.mass-operations.update'),
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
        $customerIds = $request->indices;

        if (! $this->getRepositoryInstance()->checkBulkCustomerIfTheyHaveOrderPendingOrProcessing($customerIds)) {
            foreach ($customerIds as $customerId) {
                $this->getRepositoryInstance()->findOrFail($customerId);

                $this->getRepositoryInstance()->delete($customerId);
            }

            return response([
                'message' => trans('rest-api::app.common-response.admin.customer.mass-operations.delete'),
            ]);
        }

        return response(['message' => trans('rest-api::app.common-response.admin.customer.error.order-pending-account-delete')], 400);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request, int $id)
    {
        $request->validate([
            'notes' => 'string|nullable',
        ]);

        $customerNote = $this->customerNoteRepository->create([
            'customer_id'       => $id,
            'note'              => request()->input('note'),
            'customer_notified' => request()->input('customer_notified', 0),
        ]);

        if ($customerNote) {
            return response([
                'message' => trans('rest-api::app.customers.note-taken'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.customers.note-cannot-taken'),
        ]);
    }
}

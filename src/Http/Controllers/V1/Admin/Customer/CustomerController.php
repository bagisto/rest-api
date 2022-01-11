<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Webkul\Admin\Mail\NewCustomerNotification;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Core\Http\Requests\MassUpdateRequest;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;

class CustomerController extends CustomerBaseController
{
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

        $customer = $this->getRepositoryInstance()->create($data);

        try {
            if (core()->getConfigData('emails.general.notifications.emails.general.notifications.customer')) {
                Mail::queue(new NewCustomerNotification($customer, $password));
            }
        } catch (\Exception $e) {}

        return response([
            'data'    => new CustomerResource($customer),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Customer']),
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

        $customer = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new CustomerResource($customer),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Customer']),
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
                'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Customer']),
            ]);
        }

        return response([
            'message' => __('rest-api::app.common-response.error.order-pending-account-delete', ['name' => 'Customer']),
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

            $this->getRepositoryInstance()->update(['status' => $request->update_value], $index);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.update', ['name' => 'customers']),
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

                $this->getRepositoryInstance()->delete($customerId);
            }

            return response([
                'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'customers']),
            ]);
        }

        return response(['message' => __('rest-api::app.common-response.error.order-pending-account-delete', ['name' => 'Customers'])], 400);
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
        $customer = $this->getRepositoryInstance()->findorFail($id);

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

        $customer = $this->getRepositoryInstance()->findorFail($id);

        if ($customer->update(['notes' => $request->input('notes')])) {
            return response([
                'data'    => new CustomerResource($customer),
                'message' => __('rest-api::app.customers.note-taken'),
            ]);
        }

        return response([
            'message' => __('rest-api::app.customers.note-cannot-taken'),
        ]);
    }
}

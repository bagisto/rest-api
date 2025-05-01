<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Support\Facades\Event;
use Webkul\GDPR\Repositories\GDPRDataRequestRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\GDPRRequestResource;
use Illuminate\Http\Response;

class GDPRController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected GDPRDataRequestRepository $gdprDataRequestRepository,
    ) {
        if (! core()->getConfigData('general.gdpr.settings.enabled')) {
            abort(404);
        }
    }

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return GDPRDataRequestRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return GDPRRequestResource::class;
    }

    /**
     * Method to update the Data Request information.
     *
     * @return JsonResponse
     */
    public function update(int $id): Response
    {
        try {
            Event::dispatch('customer.gdpr-request.update.before');

            $gdprRequest = $this->gdprDataRequestRepository->update(request()->all(), $id);

            Event::dispatch('customer.account.gdpr-request.update.after', $gdprRequest);

            return Response([
                'message' => trans('admin::app.customers.gdpr.index.update-success'),
            ]);
        } catch (\Exception $e) {
            return Response([
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete the GDPR Request.
     */
    public function delete(int $id): Response
    {
        $gdprRequest = $this->gdprDataRequestRepository->findOrFail($id);

        $gdprRequest->delete();

        return Response([
            'message' => trans('rest-api::app.admin.customers.gdpr.delete-success'),
        ]);
    }
}

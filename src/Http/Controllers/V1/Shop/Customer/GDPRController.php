<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Webkul\GDPR\Repositories\GDPRDataRequestRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\GDPRRequestResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GDPRController extends CustomerController
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
     * Store a new GDPR request.
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $customer = $this->resolveShopUser($request);

        $params = request()->only(['message', 'type']) + [
            'status'        => 'pending',
            'customer_id'   => $customer->id,
            'customer_name' => $customer->first_name . ' ' . $customer->last_name,
            'email'         => $customer->email,
        ];

        Event::dispatch('customer.account.gdpr-request.create.before');

        $gdprRequest = $this->gdprDataRequestRepository->create($params);

        Event::dispatch('customer.account.gdpr-request.create.after', $gdprRequest);

        return response()->json([
            'message' => trans('rest-api::app.shop.customer.gdpr.create-success'),
            'data'    => new GDPRRequestResource($gdprRequest),
        ]);
    }

    /**
     * Revoke a GDPR request.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function revoke(Request $request, int $id): JsonResponse
    {
        $customer = $this->resolveShopUser($request);

        $data = $this->gdprDataRequestRepository->findWhere([
            'id'          => $id,
            'customer_id' => $customer->id,
            'status'      => 'pending',
        ])->first();

        if (! $data) {
            return response()->json([
                'message' => trans('rest-api::app.shop.customer.gdpr.revoke-failed'),
            ], 404);
        }

        Event::dispatch('customer.account.gdpr-request.update.before');

        $gdprRequest = $this->gdprDataRequestRepository->update([
            'status'     => 'revoked',
            'revoked_at' => Carbon::now(),
        ], $id);

        Event::dispatch('customer.account.gdpr-request.update.after', $gdprRequest);

        return response()->json([
            'message' => trans('rest-api::app.shop.customer.gdpr.revoke-success'),
            'data'    => new GDPRRequestResource($gdprRequest),
        ]);
    }
}

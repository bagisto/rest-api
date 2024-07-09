<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\SubscribersListRepository;

class NewsLetterController extends CustomerController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected SubscribersListRepository $subscriptionRepository) {}

    /**
     * Store a newly created News Letter by customer.
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        $this->validate($request, [
            'email' => 'email|required',
        ]);

        $email = $request->input('email');

        $subscription = $this->subscriptionRepository->findOneByField('email', $email);

        if ($subscription) {
            return response([
                'message' => trans('rest-api::app.admin.customers.news-letter.warning-message'),
            ]);
        }

        Event::dispatch('customer.subscription.before');

        $customer = auth()->user();

        $subscription = $this->subscriptionRepository->create([
            'email'         => $email,
            'channel_id'    => core()->getCurrentChannel()->id,
            'is_subscribed' => 1,
            'token'         => uniqid(),
            'customer_id'   => $customer->id ?? null,
        ]);

        if ($customer) {
            $customer->subscribed_to_news_letter = 1;

            $customer->save();
        }

        Event::dispatch('customer.subscription.after', $subscription);

        return response([
            'date'    => $subscription,
            'message' => trans('rest-api::app.admin.customers.news-letter.create-success'),
        ]);
    }
}
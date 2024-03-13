<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications;

use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\SubscribersListRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Communications\SubscriptionResource;

class SubscriptionController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return SubscribersListRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return SubscriptionResource::class;
    }

    /**
     * To unsubscribe the user without deleting the resource of the subscribed
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function update()
    {
        $validatedData = $this->validate(request(), [
            'id'            => 'required',
            'is_subscribed' => 'required|in:0,1',
        ]);

        $subscriber = $this->getRepositoryInstance()->findOrFail($validatedData['id']);

        $customer = $subscriber->customer;

        if ($customer) {
            $customer->subscribed_to_news_letter = $validatedData['is_subscribed'];

            $customer->save();
        }

        $result = $subscriber->update(['is_subscribed' => $validatedData['is_subscribed']]);

        if (! $result) {
            return response([
                'message' => trans('Newsletter Subscription Updated Failed'),
            ], 500);
        }

        return response([
            'message' => trans('Newsletter Subscription Updated Successfully'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.subscriber.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.subscriber.delete.after', $id);

        return response([
            'message' => trans('Newsletter Subscription deleted Successfully'),
        ]);
    }
}

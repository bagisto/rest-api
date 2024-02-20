<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications;

use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\CampaignRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CampaignResource;

class CampaignController extends MarketingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CampaignRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CampaignResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'status'                => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        Event::dispatch('marketing.campaigns.create.before');

        $campaign = $this->getRepositoryInstance()->create(request()->only([
            'name',
            'subject',
            'marketing_event_id',
            'marketing_template_id',
            'status',
            'channel_id',
            'customer_group_id',
        ]));

        Event::dispatch('marketing.campaigns.create.after', $campaign);

        return response([
            'data'    => new CampaignResource($campaign),
            'message' => trans('rest-api::app.admin.marketing.communications.campaigns.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'status'                => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        Event::dispatch('marketing.campaigns.update.before', $id);

        $campaign = $this->getRepositoryInstance()->update(request()->only([
            'name',
            'subject',
            'marketing_event_id',
            'marketing_template_id',
            'status',
            'channel_id',
            'customer_group_id',
        ]), $id);

        Event::dispatch('marketing.campaigns.update.after', $campaign);

        return response([
            'data'    => new CampaignResource($campaign),
            'message' => trans('rest-api::app.admin.marketing.communications.campaigns.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.campaigns.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.campaigns.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.communications.campaigns.delete-success'),
        ]);
    }
}

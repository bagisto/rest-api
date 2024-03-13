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
     */
    public function repository():string
    {
        return CampaignRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
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
        $validatedData = $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
            'channel_id'            => 'required',
            'customer_group_id'     => 'required',
            'status'                => 'sometimes|required|in:0,1',
        ]);

        Event::dispatch('marketing.campaigns.create.before');

        $campaign = $this->getRepositoryInstance()->create($validatedData);

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
        $validatedData = $this->validate(request(), [
            'name'                  => 'required',
            'subject'               => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
            'channel_id'            => 'required',
            'customer_group_id'     => 'required',
            'status'                => 'sometimes|required|in:0,1',
        ]);

        Event::dispatch('marketing.campaigns.update.before', $id);

        $campaign = $this->getRepositoryInstance()->update($validatedData, $id);

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

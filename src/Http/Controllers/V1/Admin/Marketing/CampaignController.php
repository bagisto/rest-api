<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Webkul\Marketing\Repositories\CampaignRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'subject'               => 'required',
            'status'                => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        $campaign = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new CampaignResource($campaign),
            'message' => __('rest-api::app.common-response.success.create', ['name' => __('rest-api::app.common-response.general.campaign')]),
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
            'name'                  => 'required',
            'subject'               => 'required',
            'status'                => 'required',
            'marketing_template_id' => 'required',
            'marketing_event_id'    => 'required_if:schedule_type,event',
        ]);

        $campaign = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new CampaignResource($campaign),
            'message' => __('rest-api::app.common-response.success.update', ['name' => __('rest-api::app.common-response.general.campaign')]),
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
        $campaign = $this->getRepositoryInstance()->find($id);

        if (! $campaign) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.campaign')]),
            ]);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => __('rest-api::app.common-response.general.campaign')]),
        ]);
    }
}

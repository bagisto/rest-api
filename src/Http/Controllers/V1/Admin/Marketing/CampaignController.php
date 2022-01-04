<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\CampaignRepository;

class CampaignController extends MarketingController
{
    /**
     * Campaign repository instance.
     *
     * @var \Webkul\Core\Repositories\CampaignRepository
     */
    protected $campaignRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\CampaignRepository  $campaignRepository
     * @return void
     */
    public function __construct(CampaignRepository $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = $this->campaignRepository->all();

        return response([
            'data' => $campaigns,
        ]);
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

        Event::dispatch('marketing.campaigns.create.before');

        $campaign = $this->campaignRepository->create($request->all());

        Event::dispatch('marketing.campaigns.create.after', $campaign);

        return response([
            'message' => __('admin::app.marketing.campaigns.create-success'),
            'data'    => $campaign,
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = $this->campaignRepository->findOrFail($id);

        return response([
            'data' => $campaign,
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

        Event::dispatch('marketing.campaigns.update.before', $id);

        $campaign = $this->campaignRepository->update($request->all(), $id);

        Event::dispatch('marketing.campaigns.update.after', $campaign);

        return response([
            'message' => __('admin::app.marketing.campaigns.update-success'),
            'data'    => $campaign,
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
        $this->campaignRepository->findOrFail($id);

        try {
            Event::dispatch('marketing.campaigns.delete.before', $id);

            $this->campaignRepository->delete($id);

            Event::dispatch('marketing.campaigns.delete.after', $id);

            return response([
                'message' => __('admin::app.marketing.campaigns.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Email Campaign']),
        ], 400);
    }
}

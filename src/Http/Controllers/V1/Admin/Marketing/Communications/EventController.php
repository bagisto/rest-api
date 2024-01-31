<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\EventRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\EventResource;

class EventController extends MarketingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return EventRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return EventResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'date'        => 'date|required',
        ]);

        Event::dispatch('marketing.events.create.before');

        $event = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('marketing.events.create.after', $event);

        return response([
            'data'    => new EventResource($event),
            'message' => trans('rest-api::app.admin.marketing.communications.events.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'date'        => 'date|required',
        ]);

        Event::dispatch('marketing.events.update.before', $id);

        $event = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('marketing.events.update.after', $event);

        return response([
            'data'    => new EventResource($event),
            'message' => trans('rest-api::app.admin.marketing.communications.events.update-success'),
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
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.events.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.events.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.communications.events.delete-success'),
        ]);
    }
}

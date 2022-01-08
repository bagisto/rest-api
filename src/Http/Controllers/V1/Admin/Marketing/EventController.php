<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\EventRepository;
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
     * @param  \Illuminate\Http\Request  $request
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
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Event']),
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
            'name'        => 'required',
            'description' => 'required',
            'date'        => 'date|required',
        ]);

        Event::dispatch('marketing.events.update.before', $id);

        $event = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('marketing.events.update.after', $event);

        return response([
            'data'    => new EventResource($event),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Event']),
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
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Event']),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\EventRepository;

class EventController extends MarketingController
{
    /**
     * Event repository instance.
     *
     * @var \Webkul\Marketing\Repositories\EventRepository
     */
    protected $eventRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Marketing\Repositories\EventRepository  $eventRepository
     * @return void
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventRepository->all();

        return response([
            'data' => $events,
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
            'name'        => 'required',
            'description' => 'required',
            'date'        => 'date|required',
        ]);

        Event::dispatch('marketing.events.create.before');

        $event = $this->eventRepository->create($request->all());

        Event::dispatch('marketing.events.create.after', $event);

        return response([
            'data'    => $event,
            'message' => __('admin::app.marketing.events.create-success'),
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
        if ($id == 1) {
            return response([
                'message' => __('admin::app.marketing.events.edit-error'),
            ], 400);
        }

        $event = $this->eventRepository->findOrFail($id);

        return response([
            'data' => $event,
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

        $event = $this->eventRepository->update($request->all(), $id);

        Event::dispatch('marketing.events.update.after', $event);

        return response([
            'data'    => $event,
            'message' => __('admin::app.marketing.events.update-success'),
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
        $event = $this->eventRepository->findOrFail($id);

        try {
            Event::dispatch('marketing.events.delete.before', $id);

            $this->eventRepository->delete($id);

            Event::dispatch('marketing.events.delete.after', $id);

            return response([
                'message' => __('admin::app.marketing.events.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Event']),
        ], 400);
    }
}

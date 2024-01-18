<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
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

        $event = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new EventResource($event),
            'message' => trans('rest-api::app.admin.marketing.events.create-success'),
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

        $event = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new EventResource($event),
            'message' => trans('rest-api::app.admin.marketing.events.update-success'),
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

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.events.delete-success'),
        ]);
    }
}

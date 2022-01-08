<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\TemplateRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\TemplateResource;

class TemplateController extends MarketingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return TemplateRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return TemplateResource::class;
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
            'name'    => 'required',
            'status'  => 'required|in:active,inactive,draft',
            'content' => 'required',
        ]);

        Event::dispatch('marketing.templates.create.before');

        $template = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('marketing.templates.create.after', $template);

        return response([
            'data'    => new TemplateResource($template),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Email template']),
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
            'name'    => 'required',
            'status'  => 'required|in:active,inactive,draft',
            'content' => 'required',
        ]);

        Event::dispatch('marketing.templates.update.before', $id);

        $template = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('marketing.templates.update.after', $template);

        return response([
            'data'    => new TemplateResource($template),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Email template']),
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

        Event::dispatch('marketing.templates.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.templates.delete.after', $id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Email template']),
        ]);
    }
}

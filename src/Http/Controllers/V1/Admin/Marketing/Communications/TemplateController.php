<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications;

use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\TemplateRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'    => 'required',
            'status'  => 'required|in:active,inactive,draft',
            'content' => 'required',
        ]);

        Event::dispatch('marketing.templates.create.before');

        $template = $this->getRepositoryInstance()->create(request()->only([
            'name',
            'status',
            'content',
        ]));

        Event::dispatch('marketing.templates.create.after', $template);

        return response([
            'data'    => new TemplateResource($template),
            'message' => trans('rest-api::app.admin.marketing.communications.templates.create-success'),
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
            'name'    => 'required',
            'status'  => 'required|in:active,inactive,draft',
            'content' => 'required',
        ]);

        Event::dispatch('marketing.templates.update.before', $id);

        $template = $this->getRepositoryInstance()->update(request()->only([
            'name',
            'status',
            'content',
        ]), $id);

        Event::dispatch('marketing.templates.update.after', $template);

        return response([
            'data'    => new TemplateResource($template),
            'message' => trans('rest-api::app.admin.marketing.communications.templates.update-success'),
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

        Event::dispatch('marketing.templates.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.templates.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.communications.templates.delete-success'),
        ]);
    }
}

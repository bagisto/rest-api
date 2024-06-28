<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Communications;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\TemplateRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Communications\TemplateResource;

class TemplateController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return TemplateRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return TemplateResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): Response
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
     */
    public function update(int $id): Response
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
     */
    public function destroy(int $id): Response
    {
        $template = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.templates.delete.before', $id);

        $template->delete();

        Event::dispatch('marketing.templates.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.communications.templates.delete-success'),
        ]);
    }
}

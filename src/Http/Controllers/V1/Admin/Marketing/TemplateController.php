<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Marketing\Repositories\TemplateRepository;

class TemplateController extends MarketingController
{
    /**
     * Template repository instance.
     *
     * @var \Webkul\Core\Repositories\TemplateRepository
     */
    protected $templateRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\TemplateRepository  $templateRepository
     * @return void
     */
    public function __construct(TemplateRepository $templateRepository)
    {
        $this->templateRepository = $templateRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempates = $this->templateRepository->all();

        return response([
            'data' => $tempates,
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
            'name'    => 'required',
            'status'  => 'required|in:active,inactive,draft',
            'content' => 'required',
        ]);

        Event::dispatch('marketing.templates.create.before');

        $template = $this->templateRepository->create($request->all());

        Event::dispatch('marketing.templates.create.after', $template);

        return response([
            'data'    => $template,
            'message' => __('admin::app.marketing.templates.create-success'),
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
        $template = $this->templateRepository->findOrFail($id);

        return response([
            'data' => $template,
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

        $template = $this->templateRepository->update($request->all(), $id);

        Event::dispatch('marketing.templates.update.after', $template);

        return response([
            'data'    => $template,
            'message' => __('admin::app.marketing.templates.update-success'),
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
        $this->templateRepository->findOrFail($id);

        try {
            Event::dispatch('marketing.templates.delete.before', $id);

            $this->templateRepository->delete($id);

            Event::dispatch('marketing.templates.delete.after', $id);

            return response([
                'message' => __('admin::app.marketing.templates.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Email Template']),
        ], 400);
    }
}

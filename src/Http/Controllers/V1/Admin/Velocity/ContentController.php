<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Velocity;

use Illuminate\Http\Request;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Core\Http\Requests\MassUpdateRequest;
use Webkul\Velocity\Repositories\ContentRepository;

class ContentController extends VelocityController
{
    /**
     * Content repository instance.
     *
     * @var \Webkul\Velocity\Repositories\ContentRepository
     */
    protected $contentRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Velocity\Repositories\ContentRepository  $contentRepository
     * @return void
     */
    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => $this->contentRepository->all(),
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
        $params = $request->all();

        if (isset($params['products'])) {
            $params['products'] = json_encode($params['products']);
        }

        $content = $this->contentRepository->create($params);

        return response([
            'data'    => $content,
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Content']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = $this->contentRepository->findOrFail($id);

        return response([
            'data' => $content,
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
        $params = $request->all();

        if (isset($params['locale']) && isset($params[$params['locale']]['products'])) {
            $params[$params['locale']]['products'] = json_encode($params[$params['locale']]['products']);
        }

        $content = $this->contentRepository->update($params, $id);

        return response([
            'data'    => $content,
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Content']),
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
        $this->contentRepository->findOrFail($id);

        $this->contentRepository->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Content']),
        ]);
    }

    /**
     * Mass delete the contents.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        foreach ($request->indexes as $id) {
            $this->contentRepository->findOrFail($id);

            $this->contentRepository->delete($id);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'content']),
        ]);
    }

    /**
     * To mass update the contents.
     *
     * @param  \Webkul\Core\Http\Requests\MassUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $request)
    {
        foreach ($request->indexes as $id) {
            $this->contentRepository->findOrFail($id);

            $this->contentRepository->update(['status' => $request->update_value], $id);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.update', ['name' => 'content']),
        ]);
    }
}

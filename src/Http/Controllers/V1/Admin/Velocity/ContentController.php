<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Velocity;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Velocity\Repositories\ContentRepository;

class ContentController extends VelocityController
{
    /**
     * Product repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * Content repository instance.
     *
     * @var \Webkul\Velocity\Repositories\ContentRepository
     */
    protected $contentRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\Velocity\Repositories\ContentRepository  $contentRepository
     * @return void
     */
    public function __construct(
        ProductRepository $productRepository,
        ContentRepository $contentRepository
    ) {
        $this->productRepository = $productRepository;

        $this->contentRepository = $contentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = $this->contentRepository->all();

        return response([
            'data' => $contents,
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
            'message' => __('admin::app.response.create-success', ['name' => __('velocity::app.admin.layouts.header-content')]),
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
            'message' => __('admin::app.response.update-success', ['name' => __('velocity::app.admin.layouts.header-content')]),
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

        try {
            $this->contentRepository->delete($id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Content']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Content']),
        ], 400);
    }

    /**
     * Mass delete the contents.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $contentIds = explode(',', $request->input('indexes'));

        foreach ($contentIds as $contentId) {

            $content = $this->contentRepository->find($contentId);

            if (isset($content)) {
                $this->contentRepository->delete($contentId);
            }
        }

        return response([
            'message' => __('velocity::app.admin.contents.mass-delete-success'),
        ]);
    }

    /**
     * To mass update the contents.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(Request $request)
    {
        $contentIds = explode(',', $request->input('indexes'));

        $updateOption = $request->input('update-options');

        foreach ($contentIds as $contentId) {
            $content = $this->contentRepository->find($contentId);

            $content->update(['status' => $updateOption]);
        }

        return response([
            'message' => __('velocity::app.admin.contents.mass-update-success'),
        ]);
    }
}

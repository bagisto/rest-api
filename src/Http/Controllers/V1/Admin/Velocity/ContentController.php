<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Velocity;

use Illuminate\Http\Request;
use Webkul\Core\Http\Requests\MassUpdateRequest;
use Webkul\RestApi\Http\Resources\V1\Admin\Velocity\ContentResource;
use Webkul\Velocity\Repositories\ContentRepository;

class ContentController extends VelocityController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ContentRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ContentResource::class;
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

        $content = $this->getRepositoryInstance()->create($params);

        return response([
            'data'    => new ContentResource($content),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Content']),
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

        $content = $this->getRepositoryInstance()->update($params, $id);

        return response([
            'data'    => new ContentResource($content),
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
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Content']),
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
            $this->getRepositoryInstance()->findOrFail($id);

            $this->getRepositoryInstance()->update(['status' => $request->update_value], $id);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.update', ['name' => 'content']),
        ]);
    }
}

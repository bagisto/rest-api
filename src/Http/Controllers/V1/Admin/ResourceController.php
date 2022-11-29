<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin;

use Illuminate\Http\Request;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\RestApi\Contracts\ResourceContract;
use Webkul\RestApi\Http\Controllers\V1\V1Controller;
use Webkul\RestApi\Traits\ProvideResource;
use Webkul\RestApi\Traits\ProvideUser;

class ResourceController extends V1Controller implements ResourceContract
{
    use ProvideResource, ProvideUser;

    /**
     * Resource name.
     *
     * Can be customizable in individual controller to change the resource name.
     *
     * @var string
     */
    protected $resourceName = 'Resource(s)';

    /**
     * These are ignored during request.
     *
     * @var array
     */
    protected $requestException = ['page', 'limit', 'pagination', 'sort', 'order', 'token'];

    /**
     * Returns a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allResources(Request $request)
    {
        $query = $this->getRepositoryInstance()->scopeQuery(function ($query) use ($request) {
            foreach ($request->except($this->requestException) as $input => $value) {
                $query = $query->whereIn($input, array_map('trim', explode(',', $value)));
            }

            if ($sort = $request->input('sort')) {
                $query = $query->orderBy($sort, $request->input('order') ?? 'desc');
            } else {
                $query = $query->orderBy('id', 'desc');
            }

            return $query;
        });

        if (is_null($request->input('pagination')) || $request->input('pagination')) {
            $results = $query->paginate($request->input('limit') ?? 10);
        } else {
            $results = $query->get();
        }

        return $this->getResourceCollection($results);
    }

    /**
     * Returns an individual resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResource(Request $request, int $id)
    {
        $resourceClassName = $this->resource();

        $resource = $this->getRepositoryInstance()->findOrFail($id);

        return new $resourceClassName($resource);
    }

    /**
     * Delete's an individual resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyResource(Request $request, int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => $this->resourceName]),
        ]);
    }

    /**
     * To mass delete the resource from storage.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    protected function massDestroyResources(MassDestroyRequest $request)
    {
        $resources = $this->getRepositoryInstance()->findWhereIn('id', $request->indexes);

        if ($resources->empty()) {
            return response([
                'message' => __('rest-api::app.common-response.error.mass-operations.resource-not-found', ['name' => $this->resourceName]),
            ], 404);
        }

        $resources->each(function ($resource) {
            $this->getRepositoryInstance()->delete($resource->id);
        });

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => $this->resourceName]),
        ]);
    }
}

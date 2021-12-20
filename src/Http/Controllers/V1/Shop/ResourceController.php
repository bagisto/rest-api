<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Controllers\RestApiController;

class ResourceController extends RestApiController
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return true;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return '';
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return '';
    }

    /**
     * Get repository instance.
     *
     * @return object
     */
    public function getRepositoryInstance()
    {
        return app($this->repository());
    }

    /**
     * Get resource collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getResourceCollection($results)
    {
        return ($this->resource())::collection($results);
    }

    /**
     * Returns a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allResources(Request $request)
    {
        $query = $this->getRepositoryInstance()->scopeQuery(function ($query) use ($request) {
            if ($this->isAuthorized()) {
                $query = $query->where('customer_id', $request->user()->id);
            }

            foreach ($request->except(['page', 'limit', 'pagination', 'sort', 'order', 'token']) as $input => $value) {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResource(Request $request, int $id)
    {
        $resourceClassName = $this->resource();

        $resource = $this->isAuthorized()
            ? $this->getRepositoryInstance()->where('customer_id', $request->user()->id)->findOrFail($id)
            : $this->getRepositoryInstance()->findOrFail($id);

        return new $resourceClassName($resource);
    }

    /**
     * Delete's an individual resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyResource(Request $request, int $id)
    {
        $resource = $this->isAuthorized()
            ? $this->getRepositoryInstance()->where('customer_id', $request->user()->id)->findOrFail($id)
            : $this->getRepositoryInstance()->findOrFail($id);

        $resource->delete();

        return response([
            'message' => 'Item removed successfully.',
        ]);
    }
}

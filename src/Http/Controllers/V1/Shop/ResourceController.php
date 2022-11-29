<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Illuminate\Http\Request;
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
            if ($this->isAuthorized()) {
                $query = $query->where('customer_id', $this->resolveShopUser($request)->id);
            }

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

        $resource = $this->isAuthorized()
            ? $this->getRepositoryInstance()->where('customer_id', $this->resolveShopUser($request)->id)->findOrFail($id)
            : $this->getRepositoryInstance()->findOrFail($id);

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
        $resource = $this->isAuthorized()
            ? $this->getRepositoryInstance()->where('customer_id', $this->resolveShopUser($request)->id)->findOrFail($id)
            : $this->getRepositoryInstance()->findOrFail($id);

        $resource->delete();

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => $this->resourceName]),
        ]);
    }
}

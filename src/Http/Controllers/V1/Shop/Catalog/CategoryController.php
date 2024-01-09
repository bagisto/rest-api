<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\CategoryResource;

class CategoryController extends CatalogController
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return false;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CategoryRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CategoryResource::class;
    }

    /**
     * Returns a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function descendantCategories(Request $request)
    {
        $results = $this->getRepositoryInstance()->getVisibleCategoryTree($request->input('parent_id'));

        return $this->getResourceCollection($results);
    }
}

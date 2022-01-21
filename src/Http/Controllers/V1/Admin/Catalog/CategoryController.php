<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Category\Http\Requests\CategoryRequest;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Core\Models\Channel;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\CategoryResource;

class CategoryController extends CatalogController
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Webkul\Category\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validate([
            'slug'        => ['required', 'unique:category_translations,slug'],
            'name'        => 'required',
            'image.*'     => 'mimes:bmp,jpeg,jpg,png,webp',
            'description' => 'required_if:display_mode,==,description_only,products_and_description',
        ]);

        $category = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new CategoryResource($category),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Category']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\Category\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $category = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new CategoryResource($category),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Category']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = $this->getRepositoryInstance()->findOrFail($id);

        if (! $this->isCategoryDeletable($category)) {
            return response([
                'message' => __('rest-api::app.common-response.error.root-category-delete', ['name' => 'Category']),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Category']),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        $categories = $this->getRepositoryInstance()->findWhereIn('id', $request->indexes);

        if ($this->containsNonDeletableCategory($categories)) {
            return response([
                'message' => __('rest-api::app.common-response.error.root-category-delete', ['name' => 'Category']),
            ], 400);
        }

        $categories->each(function ($category) {
            $this->getRepositoryInstance()->delete($category->id);
        });

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'categories']),
        ]);
    }

    /**
     * Check whether the current category is deletable or not.
     *
     * This method will fetch all root category ids from the channel. If `id` is present,
     * then it is not deletable.
     *
     * @param  \Webkul\Category\Models\Category  $category
     * @return bool
     */
    private function isCategoryDeletable($category)
    {
        static $rootIdInChannels;

        if (! $rootIdInChannels) {
            $rootIdInChannels = Channel::pluck('root_category_id');
        }

        return ! ($category->id === 1 || $rootIdInChannels->contains($category->id));
    }

    /**
     * Check whether indexes contains non deletable category or not.
     *
     * @param  \Kalnoy\Nestedset\Collection  $categoryIds
     * @return bool
     */
    private function containsNonDeletableCategory($categories)
    {
        return $categories->contains(function ($category) {
            return ! $this->isCategoryDeletable($category);
        });
    }
}

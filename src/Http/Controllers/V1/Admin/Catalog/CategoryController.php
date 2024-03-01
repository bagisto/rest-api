<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\CategoryRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Models\Channel;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\CategoryResource;

class CategoryController extends CatalogController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CategoryRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CategoryResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Event::dispatch('catalog.category.create.before');

        $request->validate([
            'slug'        => ['required', 'unique:category_translations,slug'],
            'name'        => 'required',
            'image.*'     => 'mimes:bmp,jpeg,jpg,png,webp',
            'description' => 'required_if:display_mode,==,description_only,products_and_description',
        ]);

        $category = $this->getRepositoryInstance()->create($request->only([
            'name',
            'parent_id',
            'description',
            'slug',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'status',
            'position',
            'display_mode',
            'attributes',
            'logo_path',
            'banner_path',
        ]));

        Event::dispatch('catalog.category.create.after', $category);

        return response([
            'data'    => new CategoryResource($category),
            'message' => trans('rest-api::app.admin.catalog.categories.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.category.update.before', $id);

        $category = $this->getRepositoryInstance()->update($request->only([
            'name',
            'parent_id',
            'description',
            'slug',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'status',
            'position',
            'display_mode',
            'attributes',
            'logo_path',
            'banner_path',
        ]), $id);

        Event::dispatch('catalog.category.update.after', $category);

        return response([
            'data'    => new CategoryResource($category),
            'message' => trans('rest-api::app.admin.catalog.categories.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $category = $this->getRepositoryInstance()->findOrFail($id);

        if (! $this->isCategoryDeletable($category)) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.categories.root-category-delete'),
            ], 400);
        }

        Event::dispatch('catalog.category.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('catalog.category.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.categories.delete-success'),
        ]);
    }

    /**
     * Mass update Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest)
    {
        $indices = $massUpdateRequest->input('indices');

        foreach ($indices as $categoryId) {
            $this->getRepositoryInstance()->findOrFail($categoryId);

            Event::dispatch('catalog.categories.mass-update.before', $categoryId);

            $category = $this->getRepositoryInstance()->find($categoryId);

            $category->status = $massUpdateRequest->input('value');

            $category->save();

            Event::dispatch('catalog.categories.mass-update.after', $category);
        }

        return response([
            'message' => trans('rest-api::app.admin.catalog.categories.mass-operations.update-success'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest)
    {
        $categories = $this->getRepositoryInstance()->findWhereIn('id', $massDestroyRequest->indices);

        if ($this->containsNonDeletableCategory($categories)) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.categories.error.root-category-delete'),
            ], 400);
        }

        $categories->each(function ($category) {
            Event::dispatch('catalog.category.delete.before', $category->id);

            $this->getRepositoryInstance()->delete($category->id);

            Event::dispatch('catalog.category.delete.after', $category->id);
        });

        return response([
            'message' => trans('rest-api::app.admin.catalog.categories.mass-operations.delete-success'),
        ]);
    }

    /**
     * Check whether the current category is deletable or not.
     *
     * This method will fetch all root category ids from the channel. If `id` is present,
     * then it is not deletable.
     *
     * @param  \Webkul\Category\Models\Category  $category
     */
    private function isCategoryDeletable($category): bool
    {
        if ($category->id === 1) {
            return false;
        }

        return ! Channel::pluck('root_category_id')->contains($category->id);
    }

    /**
     * Check whether indexes contains non deletable category or not.
     *
     * @param  \Kalnoy\Nestedset\Collection  $categoryIds
     * @return bool
     */
    private function containsNonDeletableCategory($categories)
    {
        return $categories->contains(fn ($category) => ! $this->isCategoryDeletable($category));
    }
}

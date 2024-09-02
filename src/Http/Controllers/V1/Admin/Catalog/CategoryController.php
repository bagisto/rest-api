<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Response;
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
     */
    public function store(CategoryRequest $request): Response
    {
        Event::dispatch('catalog.category.create.before');

        $category = $this->getRepositoryInstance()->create($request->only([
            'locale',
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
     */
    public function update(CategoryRequest $request, int $id): Response
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.category.update.before', $id);

        $category = $this->getRepositoryInstance()->update($request->only([
            'locale',
            'parent_id',
            'logo_path',
            'banner_path',
            'position',
            'display_mode',
            'status',
            'attributes',
            $request->input('locale'),
        ]), $id);

        Event::dispatch('catalog.category.update.after', $category);

        return response([
            'data'    => new CategoryResource($category),
            'message' => trans('rest-api::app.admin.catalog.categories.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $category = $this->getRepositoryInstance()->findOrFail($id);

        if (! $this->isCategoryDeletable($category)) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.categories.root-category-delete'),
            ], 400);
        }

        Event::dispatch('catalog.category.delete.before', $id);

        $category->delete();

        Event::dispatch('catalog.category.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.categories.delete-success'),
        ]);
    }

    /**
     * Mass update Category.
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): Response
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
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): Response
    {
        $categoryIds = collect($massDestroyRequest->input('indices'));
    
        $categoryIds->each(function ($categoryId) {
            $category = $this->getRepositoryInstance()->find($categoryId);

            if (! $this->isCategoryDeletable($category)) {
                return response(['message' => trans('rest-api::app.admin.catalog.categories.root-category-delete')]);
            }

            Event::dispatch('catalog.category.delete.before', $categoryId);

            $this->getRepositoryInstance()->delete($categoryId);

            Event::dispatch('catalog.category.delete.after', $categoryId);
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
}

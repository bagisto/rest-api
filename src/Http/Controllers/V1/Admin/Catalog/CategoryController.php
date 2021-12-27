<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Models\Channel;

class CategoryController extends CatalogController
{
    /**
     * Category repository instance.
     *
     * @var \Webkul\Category\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Attribute repository instance.
     *
     * @var \Webkul\Attribute\Repositories\AttributeRepository
     */
    protected $attributeRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Category\Repositories\CategoryRepository  $categoryRepository
     * @param  \Webkul\Attribute\Repositories\AttributeRepository  $attributeRepository
     * @return void
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        AttributeRepository $attributeRepository
    ) {
        $this->categoryRepository = $categoryRepository;

        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'data' => $this->categoryRepository->all(),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug'        => ['required', 'unique:category_translations,slug'],
            'name'        => 'required',
            'image.*'     => 'mimes:bmp,jpeg,jpg,png,webp',
            'description' => 'required_if:display_mode,==,description_only,products_and_description',
        ]);

        $category = $this->categoryRepository->create($request->all());

        return response([
            'data'    => $category,
            'message' => __('admin::app.response.create-success', ['name' => 'Category']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = $this->categoryRepository->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTreeWithoutDescendant($id);

        $attributes = $this->attributeRepository->findWhere(['is_filterable' => 1]);

        return response([
            'data' => compact('category', 'categories', 'attributes'),
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
        $locale = core()->getRequestedLocaleCode();

        $request->validate([
            $locale . '.slug' => ['required', function ($attribute, $value, $fail) use ($id) {
                if (! $this->categoryRepository->isSlugUnique($id, $value)) {
                    $fail(__('admin::app.response.already-taken', ['name' => 'Category']));
                }
            }],
            $locale . '.name' => 'required',
            'image.*'         => 'mimes:bmp,jpeg,jpg,png,webp',
        ]);

        $category = $this->categoryRepository->update($request->all(), $id);

        return response([
            'data'    => $category,
            'message' => __('admin::app.response.update-success', ['name' => 'Category']),
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
        $category = $this->categoryRepository->findOrFail($id);

        if (! $this->isCategoryDeletable($category)) {
            return response([
                'message' => __('admin::app.response.delete-category-root', ['name' => 'Category']),
            ], 400);
        }

        try {
            Event::dispatch('catalog.category.delete.before', $category);

            $category->delete();

            Event::dispatch('catalog.category.delete.after', $category);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Category']),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => __('admin::app.response.delete-failed', ['name' => 'Category']),
            ], 500);
        }
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $categoryIds = explode(',', $request->input('indexes'));

        $categories = $this->categoryRepository->findWhereIn('id', $categoryIds);

        if ($this->containsNonDeletableCategory($categories)) {
            return response([
                'message' => __('admin::app.response.delete-category-root', ['name' => 'Category']),
            ], 400);
        }

        $categories->each(function ($category) {
            Event::dispatch('catalog.category.delete.before', $category->id);

            $category->delete();

            Event::dispatch('catalog.category.delete.after', $category->id);
        });

        return response([
            'message' => __('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'Category']),
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

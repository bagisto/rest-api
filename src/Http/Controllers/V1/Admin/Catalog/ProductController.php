<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Exception;
use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Core\Contracts\Validations\Slug;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Http\Requests\ProductForm;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends CatalogController
{
    /**
     * Category repository instance.
     *
     * @var \Webkul\Category\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Product repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * Product downloadable link repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductDownloadableLinkRepository
     */
    protected $productDownloadableLinkRepository;

    /**
     * Product downloadable sample repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductDownloadableSampleRepository
     */
    protected $productDownloadableSampleRepository;

    /**
     * Attribute family repository instance.
     *
     * @var \Webkul\Attribute\Repositories\AttributeFamilyRepository
     */
    protected $attributeFamilyRepository;

    /**
     * Inventory source repository instance.
     *
     * @var \Webkul\Inventory\Repositories\InventorySourceRepository
     */
    protected $inventorySourceRepository;

    /**
     * Product attribute value repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductAttributeValueRepository
     */
    protected $productAttributeValueRepository;

    /**
     * Product inventory repository instance.
     *
     * @var \Webkul\Product\Repositories\ProductInventoryRepository
     */
    protected $productInventoryRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Category\Repositories\CategoryRepository                  $categoryRepository
     * @param  \Webkul\Product\Repositories\ProductRepository                    $productRepository
     * @param  \Webkul\Product\Repositories\ProductDownloadableLinkRepository    $productDownloadableLinkRepository
     * @param  \Webkul\Product\Repositories\ProductDownloadableSampleRepository  $productDownloadableSampleRepository
     * @param  \Webkul\Attribute\Repositories\AttributeFamilyRepository          $attributeFamilyRepository
     * @param  \Webkul\Inventory\Repositories\InventorySourceRepository          $inventorySourceRepository
     * @param  \Webkul\Product\Repositories\ProductAttributeValueRepository      $productAttributeValueRepository
     * @return void
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        ProductDownloadableSampleRepository $productDownloadableSampleRepository,
        AttributeFamilyRepository $attributeFamilyRepository,
        InventorySourceRepository $inventorySourceRepository,
        ProductAttributeValueRepository $productAttributeValueRepository,
        ProductInventoryRepository $productInventoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;

        $this->productRepository = $productRepository;

        $this->productDownloadableLinkRepository = $productDownloadableLinkRepository;

        $this->productDownloadableSampleRepository = $productDownloadableSampleRepository;

        $this->attributeFamilyRepository = $attributeFamilyRepository;

        $this->inventorySourceRepository = $inventorySourceRepository;

        $this->productAttributeValueRepository = $productAttributeValueRepository;

        $this->productInventoryRepository = $productInventoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return [
            'data' => $products,
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
        if (
            ProductType::hasVariants($request->input('type'))
            && (! $request->has('super_attributes')
                || ! count($request->get('super_attributes')))
        ) {
            return response([
                'message' => __('admin::app.catalog.products.configurable-error'),
            ], 400);
        }

        $request->validate([
            'type'                => 'required',
            'attribute_family_id' => 'required',
            'sku'                 => ['required', 'unique:products,sku', new Slug],
        ]);

        $product = $this->productRepository->create($request->all());

        return response([
            'data'    => $product,
            'message' => __('admin::app.response.create-success', ['name' => 'Product']),
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
        $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);

        return [
            'data' => $product,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\Product\Http\Requests\ProductForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $request, $id)
    {
        $data = $request->all();

        $multiselectAttributeCodes = [];

        $productAttributes = $this->productRepository->findOrFail($id);

        foreach ($productAttributes->attribute_family->attribute_groups as $attributeGroup) {
            $customAttributes = $productAttributes->getEditableAttributes($attributeGroup);

            if (count($customAttributes)) {
                foreach ($customAttributes as $attribute) {
                    if ($attribute->type == 'multiselect' || $attribute->type == 'checkbox') {
                        array_push($multiselectAttributeCodes, $attribute->code);
                    }
                }
            }
        }

        if (count($multiselectAttributeCodes)) {
            foreach ($multiselectAttributeCodes as $multiselectAttributeCode) {
                if (! isset($data[$multiselectAttributeCode])) {
                    $data[$multiselectAttributeCode] = [];
                }
            }
        }

        $product = $this->productRepository->update($data, $id);

        return response([
            'data'    => $product,
            'message' => __('admin::app.response.update-success', ['name' => 'Product']),
        ]);
    }

    /**
     * Update inventories.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInventories(Request $request, $id)
    {
        $product = $this->productRepository->findOrFail($id);

        $this->productInventoryRepository->saveInventories($request->all(), $product);

        return response()->json([
            'data'    => [
                'total' => $this->productInventoryRepository->where('product_id', $product->id)->sum('qty'),
            ],
            'message' => __('admin::app.catalog.products.saved-inventory-message'),
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
        try {
            $this->productRepository->delete($id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Product']),
            ]);
        } catch (Exception $e) {
            return response([
                'message' => __('admin::app.response.delete-failed', ['name' => 'Product']),
            ]);
        }
    }

    /**
     * Mass delete the products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $productIds = explode(',', $request->input('indexes'));

        foreach ($productIds as $productId) {
            $product = $this->productRepository->find($productId);

            if ($product) {
                $product->delete();
            }
        }

        return response([
            'message' => __('admin::app.catalog.products.mass-delete-success'),
        ]);
    }

    /**
     * Mass update the products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(Request $request)
    {
        $data = $request->all();

        $productIds = explode(',', $data['indexes']);

        foreach ($productIds as $productId) {
            $this->productRepository->update([
                'channel' => null,
                'locale'  => null,
                'status'  => $data['update-options'],
            ], $productId);
        }

        return response([
            'message' => __('admin::app.catalog.products.mass-update-success'),
        ]);
    }
}

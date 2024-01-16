<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Webkul\Admin\Contracts\Validations\Slug;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Product\Helpers\ProductType;
use Webkul\Admin\Http\Requests\ProductForm;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\ProductResource;

class ProductController extends CatalogController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ProductRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ProductResource::class;
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
                'message' => __('rest-api::app.catalog.products.configurable-error'),
            ], 400);
        }

        $request->validate([
            'type'                => 'required',
            'attribute_family_id' => 'required',
            'sku'                 => ['required', 'unique:products,sku', new Slug],
        ]);

        Event::dispatch('catalog.product.create.before');

        $product = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('catalog.product.create.after', $product);

        return response([
            'data'    => new ProductResource($product),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Product']),
        ]);
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

        $productAttributes = $this->getRepositoryInstance()->findOrFail($id);
       
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

        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->getRepositoryInstance()->update($data, $id);
       
        Event::dispatch('catalog.product.update.after', $product);
        dd($data);
        return response([
            'data'    => new ProductResource($product),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Product']),
        ]);
    }

    /**
     * Update inventories.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Webkul\Product\Repositories\ProductInventoryRepository  $productInventoryRepository
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInventories(Request $request, ProductInventoryRepository $productInventoryRepository, $id)
    {
        $product = $this->getRepositoryInstance()->findOrFail($id);

        $productInventoryRepository->saveInventories($request->all(), $product);

        return response()->json([
            'data'    => [
                'total' => $productInventoryRepository->where('product_id', $product->id)->sum('qty'),
            ],
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Inventory']),
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
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.product.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('catalog.product.delete.after', $id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Product']),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  \Webkul\admin\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function massDestroy(MassDestroyRequest $request, $id)
    { 
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.product.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('catalog.product.delete.after', $id);

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'Product']),
        ]);
    }

    /**
     * Mass update the products.
     *
     * @param  \Webkul\Core\Http\Requests\MassUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $request)
    {
        foreach ($request->indexes as $id) {
            $this->getRepositoryInstance()->findOrFail($id);

            Event::dispatch('catalog.product.update.before', $id);

            $product = $this->getRepositoryInstance()->update([
                'channel' => null,
                'locale'  => null,
                'status'  => $request->update_value,
            ], $id);

            Event::dispatch('catalog.product.update.after', $product);
        }
        
        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.update', ['name' => 'products']),
        ]);
    }
}

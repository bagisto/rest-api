<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\InventoryRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\ProductForm;
use Webkul\Core\Rules\Slug;
use Webkul\Product\Helpers\ProductType;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\ProductResource;

class ProductController extends CatalogController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ProductRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'type'                => 'required',
            'attribute_family_id' => 'required',
            'sku'                 => ['required', 'unique:products,sku', new Slug],
            'super_attributes'    => 'array|min:1',
            'super_attributes.*'  => 'array|min:1',
        ]);

        if (
            ProductType::hasVariants($request->input('type'))
            && ! $request->has('super_attributes')
        ) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.products.error.configurable-error'),
            ], 400);
        }

        Event::dispatch('catalog.product.create.before');

        $product = $this->getRepositoryInstance()->create($request->only([
            'type',
            'attribute_family_id',
            'sku',
            'super_attributes',
            'family',
        ]));

        Event::dispatch('catalog.product.create.after', $product);

        return response([
            'data'    => new ProductResource($product),
            'message' => trans('rest-api::app.admin.catalog.products.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductForm $request, int $id): Response
    {
        Event::dispatch('catalog.product.update.before', $id);

        $product = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('catalog.product.update.after', $product);

        return response([
            'data'    => new ProductResource($product),
            'message' => trans('rest-api::app.admin.catalog.products.update-success'),
        ]);
    }

    /**
     * Update inventories.
     */
    public function updateInventories(InventoryRequest $inventoryRequest, ProductInventoryRepository $productInventoryRepository, int $id): Response
    {
        $product = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.product.update.before', $id);

        $productInventoryRepository->saveInventories($inventoryRequest->all(), $product);

        Event::dispatch('catalog.product.update.after', $product);

        return response([
            'data'    => [
                'total' => $productInventoryRepository->where('product_id', $product->id)->sum('qty'),
            ],
            'message' => trans('rest-api::app.admin.catalog.products.inventories.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $product = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.product.delete.before', $id);

        $product->delete();

        Event::dispatch('catalog.product.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.products.delete-success'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): Response
    {
        $productIds = $massDestroyRequest->input('indices');

        foreach ($productIds as $productId) {
            Event::dispatch('catalog.product.delete.before', $productId);

            $this->getRepositoryInstance()->delete($productId);

            Event::dispatch('catalog.product.delete.after', $productId);
        }

        return response([
            'message' => trans('rest-api::app.admin.catalog.products.mass-operations.delete-success'),
        ]);
    }

    /**
     * Mass update the products.
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): Response
    {
        foreach ($massUpdateRequest->indices as $id) {
            $this->getRepositoryInstance()->findOrFail($id);

            Event::dispatch('catalog.product.update.before', $id);

            $product = $this->getRepositoryInstance()->update([
                'channel' => null,
                'locale'  => null,
                'status'  => $massUpdateRequest->value,
            ], $id);

            Event::dispatch('catalog.product.update.after', $product);
        }

        return response([
            'message' => trans('rest-api::app.admin.catalog.products.mass-operations.update-success'),
        ]);
    }
}

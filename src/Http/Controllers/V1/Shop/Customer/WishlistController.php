<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerWishlistResource;

class WishlistController extends CustomerController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected WishlistRepository $wishlistRepository,
        protected ProductRepository $productRepository
    ) {}

    /**
     * Get customer wishlist.
     */
    public function index(Request $request): Response
    {
        $customer = $this->resolveShopUser($request);

        return response([
            'data' => CustomerWishlistResource::collection($customer->wishlist_items()->get()),
        ]);
    }

    /**
     * Add or remote item from wishlist.
     */
    public function addOrRemove(Request $request, int $id): Response
    {
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $product = $this->productRepository->findOrFail($id);

        $customer = $this->resolveShopUser($request);

        $wishlistItem = $this->wishlistRepository->findOneWhere([
            'channel_id'  => core()->getCurrentChannel()->id,
            'product_id'  => $product->id,
            'customer_id' => $customer->id,
        ]);

        if ($wishlistItem) {
            $this->wishlistRepository->delete($wishlistItem->id);

            return response([
                'data'    => CustomerWishlistResource::collection($customer->wishlist_items()->get()),
                'message' => trans('rest-api::app.shop.wishlist.removed'),
            ]);
        }

        $wishlistItem = $this->wishlistRepository->create([
            'channel_id'  => core()->getCurrentChannel()->id,
            'product_id'  => $product->id,
            'customer_id' => $customer->id,
            'additional'  => $request->input('additional') ?? null,
        ]);

        return response([
            'data'    => new CustomerWishlistResource($wishlistItem),
            'message' => trans('rest-api::app.shop.wishlist.success'),
        ]);
    }

    /**
     * Move product from wishlist to cart.
     */
    public function moveToCart(Request $request, int $id): Response
    {
        $customer = $this->resolveShopUser($request);

        $wishlistItem = $this->wishlistRepository->findOneWhere([
            'product_id'  => $id,
            'customer_id' => $customer->id,
        ]);

        if (! $wishlistItem) {
            return response([
                'message' => trans('rest-api::app.shop.wishlist.error.mass-operations.resource-not-found'),
            ], 400);
        }

        if ($wishlistItem->customer_id != $customer->id) {
            return response([
                'message' => trans('rest-api::app.shop.wishlist.error.security-warning'),
            ], 400);
        }

        $result = Cart::moveToCart($wishlistItem, $request->input('quantity'));

        if ($result) {
            $cart = Cart::getCart();

            return response([
                'data'    => $cart ? new CartResource($cart) : null,
                'message' => trans('rest-api::app.shop.wishlist.moved'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.shop.wishlist.option-missing'),
        ], 400);
    }

     /**
     * Method for removing all items from the wishlist.
     */
    public function destroyAll(Request $request): Response
    {
        $customer = $this->resolveShopUser($request);

        $success = $this->wishlistRepository->deleteWhere([
            'customer_id'  => $customer->id,
        ]);

        if (! $success) {
            return response([
                'message'  => trans('rest-api::app.shop.wishlist.remove-fail'),
            ]);
        }

        return response([
            'message'  => trans('rest-api::app.shop.wishlist.removed'),
        ]);
    }
}

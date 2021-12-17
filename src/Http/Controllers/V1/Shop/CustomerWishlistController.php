<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Checkout\CartResource;
use Webkul\RestApi\Http\Resources\V1\Customer\CustomerWishlistResource;

class CustomerWishlistController extends Controller
{
    /**
     * Wishlist repository instance.
     *
     * @var \Webkul\Customer\Repositories\WishlistRepository
     */
    protected $wishlistRepository;

    /**
     * Product repository instance.
     *
     * @var \Webkul\Customer\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * Create a new controller istance.
     *
     * @param  \Webkul\Customer\Repositories\WishlistRepository  $wishlistRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     */
    public function __construct(
        WishlistRepository $wishlistRepository,
        ProductRepository $productRepository
    ) {
        $this->wishlistRepository = $wishlistRepository;

        $this->productRepository = $productRepository;
    }

    /**
     * Get customer wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = $request->user();

        return response([
            'data' => CustomerWishlistResource::collection($customer->wishlist_items()->get()),
        ]);
    }

    /**
     * Add or remote item from wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addOrRemove(Request $request, $id)
    {
        $customer = $request->user();

        $wishlistItem = $this->wishlistRepository->findOneWhere([
            'channel_id'  => core()->getCurrentChannel()->id,
            'product_id'  => $id,
            'customer_id' => $customer->id,
        ]);

        if ($wishlistItem) {
            $this->wishlistRepository->delete($wishlistItem->id);

            return response([
                'data'    => null,
                'message' => 'Item removed from wishlist successfully.',
            ]);
        }

        $wishlistItem = $this->wishlistRepository->create([
            'channel_id'  => core()->getCurrentChannel()->id,
            'product_id'  => $id,
            'customer_id' => $customer->id,
        ]);

        return response([
            'data'    => new CustomerWishlistResource($wishlistItem),
            'message' => __('customer::app.wishlist.success'),
        ]);
    }

    /**
     * Move product from wishlist to cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart(Request $request, $id)
    {
        $customer = $request->user();

        $wishlistItem = $this->wishlistRepository->findOneWhere([
            'channel_id'  => core()->getCurrentChannel()->id,
            'product_id'  => $id,
            'customer_id' => $customer->id,
        ]);

        if ($wishlistItem->customer_id != $customer->user()->id) {
            return response([
                'message' => __('shop::app.security-warning'),
            ], 400);
        }

        $result = Cart::moveToCart($wishlistItem);

        if ($result) {
            Cart::collectTotals();

            $cart = Cart::getCart();

            return response([
                'data'    => $cart ? new CartResource($cart) : null,
                'message' => __('shop::app.wishlist.moved'),
            ]);
        }

        return response([
            'data'    => -1,
            'message' => __('shop::app.wishlist.option-missing'),
        ], 400);
    }
}

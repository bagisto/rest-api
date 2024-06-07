<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;

class CartController extends CustomerController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected WishlistRepository $wishlistRepository,
        protected ProductRepository $productRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository
    ) {
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CartResource::class;
    }

    /**
     * Get the customer cart.
     */
    public function index(): JsonResponse
    {
        Cart::collectTotals();

        return response()->json([
            'data' => ($cart = Cart::getCart()) ? app()->make($this->resource(), ['resource' => $cart]) : null,
        ]);
    }

    /**
     * Store items to the cart.
     */
    public function store($productId): JsonResponse
    {
        try {
            $product = $this->productRepository->with('parent')->find($productId);

            Event::dispatch('checkout.cart.item.add.before', $product->id);

            if (request()->get('is_buy_now')) {
                Cart::deActivateCart();
            }

            $cart = Cart::addProduct($product->id, request()->all());

            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return response()->json([
                    'message' => $cart['warning'],
                ], 400);
            }

            if ($cart) {
                $customer = $this->resolveShopUser(request());

                if ($customer) {
                    $this->wishlistRepository->deleteWhere([
                        'product_id'  => $product->id,
                        'customer_id' => $customer->id,
                    ]);
                }

                Event::dispatch('checkout.cart.item.add.after', $cart);

                if (request()->get('is_buy_now')) {
                    Event::dispatch('shop.item.buy-now', request()->input('product_id'));

                    return response()->json([
                        'data'     => app()->make($this->resource(), ['resource' => Cart::getCart()]),
                        'message'  => trans('rest-api::app.shop.checkout.cart.item.success'),
                    ]);
                }

                return response()->json([
                    'data'    => app()->make($this->resource(), ['resource' => Cart::getCart()]),
                    'message' => trans('rest-api::app.shop.checkout.cart.item.success'),
                ]);
            }

            return response()->json([
                'data'    => null,
                'message' => trans('rest-api::app.shop.checkout.cart.item.success'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message'      => $exception->getMessage(),
            ], 400);
        }
    }

    /**
     * Updates the quantity of the items present in the cart.
     */
    public function update(): JsonResponse
    {
        foreach (request()->qty as $qty) {
            if (! $qty) {
                return response()->json([
                    'message' => trans('rest-api::app.shop.checkout.cart.quantity.illegal'),
                ], 400);
            }
        }

        try {
            Cart::updateItems(request()->input());

            return response()->json([
                'data'    => app()->make($this->resource(), ['resource' => Cart::getCart()]),
                'message' => trans('rest-api::app.shop.checkout.cart.quantity.success'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Remove item from the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeItem(int $cartItemId)
    {
        Event::dispatch('checkout.cart.item.delete.before', $cartItemId);

        Cart::removeItem($cartItemId);

        Event::dispatch('checkout.cart.item.delete.after', $cartItemId);

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response([
            'data'    => $cart ? app()->make($this->resource(), ['resource' => $cart]) : null,
            'message' => trans('rest-api::app.shop.checkout.cart.item.success-remove'),
        ]);
    }

    /**
     * Empty the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        Event::dispatch('checkout.cart.delete.before');

        Cart::deActivateCart();

        Event::dispatch('checkout.cart.delete.after');

        $cart = Cart::getCart();

        return response([
            'data'    => $cart ? app()->make($this->resource(), ['resource' => $cart]) : null,
            'message' => trans('rest-api::app.shop.checkout.cart.item.success-remove'),
        ]);
    }

    /**
     * Apply the coupon code.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->code;

        try {
            if (strlen($couponCode)) {
                Cart::setCouponCode($couponCode)->collectTotals();

                if (Cart::getCart()->coupon_code == $couponCode) {

                    $cart = Cart::getCart();

                    return response([
                        'data'    => $cart ? app()->make($this->resource(), ['resource' => $cart]) : null,
                        'message' => trans('rest-api::app.shop.checkout.cart.coupon.success'),
                    ]);
                }
            }

            return response([
                'message' => trans('rest-api::app.shop.checkout.cart.coupon.invalid'),
            ], 400);
        } catch (\Exception $e) {
            report($e);

            return response([
                'message' => trans('rest-api::app.shop.checkout.cart.coupon.apply-issue'),
            ], 400);
        }
    }

    /**
     * Remove the coupon code.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeCoupon()
    {   
        Cart::removeCouponCode()->collectTotals();

        $cart = Cart::getCart();

        return response([
            'data'    => $cart ? app()->make($this->resource(), ['resource' => $cart]) : null,
            'message' => __('rest-api::app.shop.checkout.cart.coupon.success-remove'),
        ]);
    }

    /**
     * Move cart item to wishlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function moveToWishlist(int $cartItemId)
    {
        Event::dispatch('checkout.cart.item.move-to-wishlist.before', $cartItemId);

        Cart::moveToWishlist($cartItemId);

        Event::dispatch('checkout.cart.item.move-to-wishlist.after', $cartItemId);

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response([
            'data'    => $cart ? app()->make($this->resource(), ['resource' => $cart]) : null,
            'message' => __('rest-api::app.shop.checkout.cart.move-wishlist.success'),
        ]);
    }
}

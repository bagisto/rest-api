<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Cart;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Webkul\API\Http\Resources\Checkout\Cart as CartResource;
use Webkul\Checkout\Repositories\CartItemRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\WishlistRepository;

class CustomerCartController extends Controller
{
    /**
     * Cart repository instance.
     *
     * @var \Webkul\Checkout\Repositories\CartRepository
     */
    protected $cartRepository;

    /**
     * Cart item repository instance.
     *
     * @var \Webkul\Checkout\Repositories\CartItemRepository
     */
    protected $cartItemRepository;

    /**
     * Wishlist repository instance.
     *
     * @var \Webkul\Checkout\Repositories\WishlistRepository
     */
    protected $wishlistRepository;

    /**
     * Controller instance.
     *
     * @param  \Webkul\Checkout\Repositories\CartRepository  $cartRepository
     * @param  \Webkul\Checkout\Repositories\CartItemRepository  $cartItemRepository
     * @param  \Webkul\Checkout\Repositories\WishlistRepository  $wishlistRepository
     * @return void
     */
    public function __construct(
        CartRepository $cartRepository,
        CartItemRepository $cartItemRepository,
        WishlistRepository $wishlistRepository
    ) {
        $this->_config = request('_config');

        $this->cartRepository = $cartRepository;

        $this->cartItemRepository = $cartItemRepository;

        $this->wishlistRepository = $wishlistRepository;
    }

    /**
     * Get the customer cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $cart = Cart::getCart();

        return response()->json([
            'data' => $cart ? new CartResource($cart) : null,
        ]);
    }

    /**
     * Add item to the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id): ?JsonResponse
    {
        if (request()->get('is_buy_now')) {
            Event::dispatch('shop.item.buy-now', $id);
        }

        Event::dispatch('checkout.cart.item.add.before', $id);

        try {
            $result = Cart::addProduct($id, $request->all());

            if (is_array($result) && isset($result['warning'])) {
                return response()->json([
                    'error' => $result['warning'],
                ], 400);
            }

            if ($customer = auth($this->guard)->user()) {
                $this->wishlistRepository->deleteWhere(['product_id' => $id, 'customer_id' => $customer->id]);
            }

            Event::dispatch('checkout.cart.item.add.after', $result);

            Cart::collectTotals();

            $cart = Cart::getCart();

            return response()->json([
                'message' => __('shop::app.checkout.cart.item.success'),
                'data'    => $cart ? new CartResource($cart) : null,
            ]);
        } catch (Exception $e) {
            Log::error('API CartController: ' . $e->getMessage(),
                ['product_id' => $id, 'cart_id' => cart()->getCart() ?? 0]);

            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                    'code'    => $e->getCode(),
                ],
            ]);
        }
    }

    /**
     * Update the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|array',
        ]);

        $requestedQuantity = $request->get('qty');

        foreach ($requestedQuantity as $qty) {
            if ($qty <= 0) {
                return response()->json([
                    'message' => trans('shop::app.checkout.cart.quantity.illegal'),
                ], Response::HTTP_UNAUTHORIZED);
            }
        }

        foreach ($requestedQuantity as $itemId => $qty) {
            $item = $this->cartItemRepository->findOneByField('id', $itemId);

            Event::dispatch('checkout.cart.item.update.before', $itemId);

            Cart::updateItems(['qty' => $requestedQuantity]);

            Event::dispatch('checkout.cart.item.update.after', $item);
        }

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response()->json([
            'message' => __('shop::app.checkout.cart.quantity.success'),
            'data'    => $cart ? new CartResource($cart) : null,
        ]);
    }

    /**
     * Empty the cart.
     *
     * @return \Illuminate\Http\Response
     */
    function empty() {
        Event::dispatch('checkout.cart.delete.before');

        Cart::deActivateCart();

        Event::dispatch('checkout.cart.delete.after');

        $cart = Cart::getCart();

        return response()->json([
            'message' => __('shop::app.checkout.cart.item.success-remove'),
            'data'    => $cart ? new CartResource($cart) : null,
        ]);
    }

    /**
     * Remove item from the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeItem($id)
    {
        Event::dispatch('checkout.cart.item.delete.before', $id);

        Cart::removeItem($id);

        Event::dispatch('checkout.cart.item.delete.after', $id);

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response()->json([
            'message' => __('shop::app.checkout.cart.item.success-remove'),
            'data'    => $cart ? new CartResource($cart) : null,
        ]);
    }

    /**
     * Apply the coupon code.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon()
    {
        $couponCode = request()->get('code');

        try {
            if (strlen($couponCode)) {
                Cart::setCouponCode($couponCode)->collectTotals();

                if (Cart::getCart()->coupon_code == $couponCode) {
                    return response()->json([
                        'success' => true,
                        'message' => trans('shop::app.checkout.total.success-coupon'),
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => trans('shop::app.checkout.total.invalid-coupon'),
            ]);
        } catch (\Exception $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => trans('shop::app.checkout.total.coupon-apply-issue'),
            ]);
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

        return response()->json([
            'success' => true,
            'message' => trans('shop::app.checkout.total.remove-coupon'),
        ]);
    }

    /**
     * Move cart item to wishlist.
     *
     * @param  \Webkul\Checkout\Repositories\CartItemRepository  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToWishlist($id)
    {
        Event::dispatch('checkout.cart.item.move-to-wishlist.before', $id);

        Cart::moveToWishlist($id);

        Event::dispatch('checkout.cart.item.move-to-wishlist.after', $id);

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response()->json([
            'message' => __('shop::app.checkout.cart.move-to-wishlist-success'),
            'data'    => $cart ? new CartResource($cart) : null,
        ]);
    }
}

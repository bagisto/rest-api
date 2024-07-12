<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Response;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Facades\Payment;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Shop\Http\Requests\CartAddressRequest;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductRepository;

class ReOrderController extends SalesController
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected CustomerAddressRepository $customerAddressRepository,
        protected CartRepository $cartRepository,
        protected CustomerRepository $customerRepository,
        protected ProductRepository $productRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository
    ) {}


    /**
     * Reorder action for the specified resource.
     */
    public function store($id): Response
    {
        $order = $this->orderRepository->findOrFail($id);

        $cart = Cart::createCart([
            'customer'  => $order->customer,
            'is_active' => false,
        ]);

        Cart::setCart($cart);

        foreach ($order->items as $item) {
            Cart::addProduct($item->product, $item->additional);
        }

        return response([
            'data' => $cart,
            'message' => trans('Item added successfully to cart')
        ]);
    }

    /**
     * Save customer address.
     */
    public function saveAddress(CartAddressRequest $cartAddressRequest, int $id): Response
    {
        $cart = $this->cartRepository->findOrFail($id);

        $params = $cartAddressRequest->all();
        
        Cart::setCart($cart);

        if (Cart::hasError()) {
            return response([
                'message' => implode(': ', Cart::getErrors()) ?: 'Something went wrong',
            ], Response::HTTP_BAD_REQUEST);
        }

        Cart::saveAddresses($params);

        Cart::collectTotals();

        if ($cart->haveStockableItems()) {
            if (! $rates = Shipping::collectRates()) {
                return response([
                    'message' => trans('Their are no any shipping methods available.'),
                ]);
            }

            return response([
                'data' => $rates,
                'message' => trans(''),
            ]);
        }

        return response([
            'data' => Payment::getSupportedPaymentMethods(),
        ]);
    }

    /**
     * Save shipping method.
     */
    public function saveShipping(int $id): Response
    {
        $validatedData = $this->validate(request(), [
            'shipping_method' => 'required',
        ]);

        $cart = $this->cartRepository->findOrFail($id);

        Cart::setCart($cart);

        if (
            Cart::hasError()
            || ! $validatedData['shipping_method']
            || ! Cart::saveShippingMethod($validatedData['shipping_method'])
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        return response(Payment::getSupportedPaymentMethods());
    }

    /**
     * Save payment method.
     */
    public function savePayment(int $id): Response
    {
        $validatedData = $this->validate(request(), [
            'payment' => 'required',
        ]);

        $cart = $this->cartRepository->findOrFail($id);

        Cart::setCart($cart);

        if (
            Cart::hasError()
            || ! $validatedData['payment']
            || ! Cart::savePaymentMethod($validatedData['payment'])
        ) {
            return response([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response([
            'cart' => new CartResource($cart),
        ]);
    }
}

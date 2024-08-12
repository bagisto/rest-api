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
                'message' => trans('Address Saved Successfully'),
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

        return response([
            'data'    => Payment::getSupportedPaymentMethods(),
            'message' => trans('Shipping Method Saved Successfully'),
        ]);
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
            'data'    => new CartResource($cart),
            'message' => trans('Payment Method Saved Successfully'),
        ]);
    }

    /**
     * Store order
     */
    public function saveOrder(): Response
    {
        if (Cart::hasError()) {
            return response([
                'message' => 'Something went wrong while saving order.'
            ]);
        }

        Cart::collectTotals();

        try {
            $this->validateOrder();
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ], 500);
        }

        $cart = Cart::getCart();

        $data = (response($cart))->jsonSerialize();

        $order = $this->orderRepository->create($data);

        Cart::deActivateCart();

        return response([
            'data'    => $order,
            'message' => 'Order was successfully placed.',
        ]);
    }

    /**
     * Validate order before creation.
     *
     * @return void|\Exception
     */
    public function validateOrder()
    {
        $cart = Cart::getCart();

        $minimumOrderAmount = core()->getConfigData('sales.order_settings.minimum_order.minimum_order_amount') ?: 0;

        if (
            auth()->guard('customer')->check()
            && auth()->guard('customer')->user()->is_suspended
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.suspended-account-message'));
        }

        if (
            auth()->guard('customer')->user()
            && ! auth()->guard('customer')->user()->status
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.inactive-account-message'));
        }

        if (! Cart::haveMinimumOrderAmount()) {
            throw new \Exception(trans('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]));
        }

        if ($cart->haveStockableItems() && ! $cart->shipping_address) {
            throw new \Exception(trans('shop::app.checkout.onepage.address.check-shipping-address'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(trans('shop::app.checkout.onepage.address.check-billing-address'));
        }

        if (
            $cart->haveStockableItems()
            && ! $cart->selected_shipping_rate
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-shipping-method'));
        }

        if (! $cart->payment) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-payment-method'));
        }
    }
}

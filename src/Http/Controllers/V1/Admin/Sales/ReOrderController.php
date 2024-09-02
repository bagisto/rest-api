<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Response;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Payment\Facades\Payment;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Transformers\OrderResource;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Shop\Http\Requests\CartAddressRequest;

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
            'message' => trans('rest-api::app.admin.sales.re-order.create')
        ]);
    }

    /**
     * Save customer address.
     */
    public function saveAddress(CartAddressRequest $cartAddressRequest, int $id): Response
    {
        if (Cart::hasError()) {
            return response([
                'message' => implode(': ', Cart::getErrors()) ?: 'rest-api::app.admin.sales.re-order.error',
            ]);
        }

        Cart::saveAddresses($cartAddressRequest->all());

        $carts = Cart::getCart();

        Cart::collectTotals();

        if ($carts->haveStockableItems()) {
            if (! $rates = Shipping::collectRates()) {
                return response([
                    'message' => trans('rest-api::app.admin.sales.re-order.address-not-available'),
                ]);
            }

            return response([
                'data' => $rates,
                'message' => trans('rest-api::app.admin.sales.re-order.address-create-success'),
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

        if (
            Cart::hasError()
            || ! $validatedData['shipping_method']
            || ! Cart::saveShippingMethod($validatedData['shipping_method'])
        ) {
            return response([
                'data' => trans('rest-api::app.admin.sales.re-order.error'),
            ]);
        }

        Cart::collectTotals();

        return response([
            'data'    => Payment::getSupportedPaymentMethods(),
            'message' => trans('rest-api::app.admin.sales.re-order.shipping-create-success'),
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

        if (
            Cart::hasError()
            || ! $validatedData['payment']
            || ! Cart::savePaymentMethod($validatedData['payment'])
        ) {
            return response([
                'data' => trans('rest-api::app.admin.sales.re-order.error'),
            ]);
        }

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response([
            'data'    => new CartResource($cart),
            'message' => trans('rest-api::app.admin.sales.re-order.payment-create-success'),
        ]);
    }

    /**
     * Store order
     */
    public function saveOrder(int $id): Response
    {
        if (Cart::hasError()) {
            return response([
                'data' => trans('rest-api::app.admin.sales.re-order.error'),
            ]);
        }

        Cart::collectTotals();

        try {
            $this->validateOrder($id);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ], 500);
        }

        $data = (new OrderResource(Cart::getCart()))->jsonSerialize();

        $this->orderRepository->create($data);

        Cart::deActivateCart();

        return response([
            'message' =>  trans('rest-api::app.admin.sales.re-order.order-create-success'),
        ]);
    }

    /**
     * Validate order before creation.
     *
     * @return void|\Exception
     */
    public function validateOrder(int $id)
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

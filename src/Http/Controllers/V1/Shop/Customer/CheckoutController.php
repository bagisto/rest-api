<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Facades\Payment;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartShippingRateResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Sales\OrderResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Shop\Http\Requests\CartAddressRequest;

class CheckoutController extends CustomerController
{
    /**
     * Save customer address.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAddress(CartAddressRequest $cartAddressRequest)
    {
        $data =  $cartAddressRequest->all();

        if (
            Cart::hasError()
            || ! Shipping::collectRates()
        ) {
            abort(400);
        }

        Cart::saveAddresses($data);

        $rates = [];

        foreach (Shipping::getGroupedAllShippingRates() as $code => $shippingMethod) {
            $rates[] = [
                'carrier_title' => $shippingMethod['carrier_title'],
                'rates'         => CartShippingRateResource::collection(collect($shippingMethod['rates'])),
            ];
        }

        Cart::collectTotals();

        return response([
            'data'    => [
                'rates' => $rates,
                'cart'  => new CartResource(Cart::getCart()),
            ],
            'message' => trans('rest-api::app.shop.checkout.billing-address-saved'),
        ]);
    }

    /**
     * Save shipping method.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveShipping(Request $request)
    {
        $validatedData = $this->validate($request, [
            'shipping_method' => 'required',
        ]);

        if (Cart::hasError()
            || ! $validatedData['shipping_method']
            || ! Cart::saveShippingMethod($validatedData['shipping_method'])
        ) {
            abort(400);
        }

        Cart::collectTotals();

        return response([
            'data'    => [
                'methods' => Payment::getPaymentMethods(),
                'cart'    => new CartResource(Cart::getCart()),
            ],
            'message' => trans('rest-api::app.shop.checkout.shipping-method-saved'),
        ]);
    }

    /**
     * Save payment method.
     *
     * @return \Illuminate\Http\Response
     */
    public function savePayment(Request $request)
    {
        $validatedData = $this->validate($request, [
            'payment' => 'required',
        ]);

        if (
            Cart::hasError() 
            || ! $validatedData['payment'] 
            || ! Cart::savePaymentMethod($validatedData['payment'])
        ) {
            abort(400);
        }

        Cart::collectTotals();

        return response([
            'data'    => [
                'cart' => new CartResource(Cart::getCart()),
            ],
            'message' => trans('rest-api::app.shop.checkout.payment-method-saved'),
        ]);
    }

    /**
     * Check for minimum order.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkMinimumOrder()
    {
        $minimumOrderAmount = (float) core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;

        $status = Cart::checkMinimumOrder();

        return response([
            'data'    => [
                'cart'   => new CartResource(Cart::getCart()),
                'status' => ! $status ? false : true,
            ],
            'message' => ! $status ? trans('rest-api::app.shop.checkout.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]) : 'Success',
        ]);
    }

    /**
     * Save order.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveOrder(OrderRepository $orderRepository)
    {
        if (Cart::hasError()) {
            abort(400);
        }

        Cart::collectTotals();

        $this->validateOrder();

        $cart = Cart::getCart();

        if ($redirectUrl = Payment::getRedirectUrl($cart)) {
            return response([
                'redirect_url' => $redirectUrl,
            ]);
        }

        $order = $orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        return response([
            'data'    => [
                'order' => new OrderResource($order),
            ],
            'message' => trans('rest-api::app.shop.checkout.order-saved'),
        ]);
    }

    /**
     * Validate order before creation.
     *
     * @return void|\Exception
     */
    protected function validateOrder()
    {
        $cart = Cart::getCart();

        $minimumOrderAmount = core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;

        if (! $cart->checkMinimumOrder()) {
            throw new \Exception(trans('rest-api::app.shop.checkout.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]));
        }

        if ($cart->haveStockableItems() && ! $cart->shipping_address) {
            throw new \Exception(trans('rest-api::app.shop.checkout.check-shipping-address'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(trans('rest-api::app.shop.checkout.check-billing-address'));
        }

        if ($cart->haveStockableItems() && ! $cart->selected_shipping_rate) {
            throw new \Exception(trans('rest-api::app.shop.checkout.specify-shipping-method'));
        }

        if (! $cart->payment) {
            throw new \Exception(trans('rest-api::app.shop.checkout.specify-payment-method'));
        }
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Facades\Payment;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Sales\Repositories\OrderRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Shop\Http\Requests\Customer\CustomerAddressForm;
use Webkul\RestApi\Http\Resources\V1\Shop\Sales\OrderResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Checkout\CartShippingRateResource;

class CheckoutController extends CustomerController
{
    /**
     * Save customer address.
     *
     * @param  \Webkul\Checkout\Http\Requests\CustomerAddressForm  $request
     * @return \Illuminate\Http\Response
     */
    public function saveAddress(CustomerAddressForm $request)
    {
        $data = $request->all();

        if (
            ! auth()->guard('customer')->check()
            && ! Cart::getCart()->hasGuestCheckoutItems()
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.customer.session.index'),
            ]);
        }
       
        $data['billing']['address1'] = implode(PHP_EOL, $data['billing']['address1']);

        $data['shipping']['address1'] = implode(PHP_EOL, $data['shipping']['address1']);

        if (
          Cart::hasError() 
         || ! Cart::saveCustomerAddress($data)
        ) {
            abort(400);
        }
         
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
            'message' => 'Address saved successfully.',
        ]);
    }

    /**
     * Save shipping method.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveShipping(Request $request)
    {
        $shippingMethod = $request->get('shipping_method');

        if (Cart::hasError()
            || ! $shippingMethod
            || ! Cart::saveShippingMethod($shippingMethod)
        ) {
            abort(400);
        }

        Cart::collectTotals();

        return response([
            'data'    => [
                'methods' => Payment::getPaymentMethods(),
                'cart'    => new CartResource(Cart::getCart()),
            ],
            'message' => 'Shipping method saved successfully.',
        ]);
    }

    /**
     * Save payment method.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePayment(Request $request)
    {
        $payment = $request->get('payment');

        if (Cart::hasError() || ! $payment || ! Cart::savePaymentMethod($payment)) {
            abort(400);
        }

        return response([
            'data'    => [
                'cart' => new CartResource(Cart::getCart()),
            ],
            'message' => 'Payment method saved successfully.',
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
            'message' => ! $status ? __('rest-api::app.checkout.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]) : 'Success',
        ]);
    }

    /**
     * Save order.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
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
            'message' => 'Order saved successfully.',
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
            throw new \Exception(__('rest-api::app.checkout.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]));
        }

        if ($cart->haveStockableItems() && ! $cart->shipping_address) {
            throw new \Exception(__('rest-api::app.checkout.check-shipping-address'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(__('rest-api::app.checkout.check-billing-address'));
        }

        if ($cart->haveStockableItems() && ! $cart->selected_shipping_rate) {
            throw new \Exception(__('rest-api::app.checkout.specify-shipping-method'));
        }

        if (! $cart->payment) {
            throw new \Exception(__('rest-api::app.checkout.specify-payment-method'));
        }
    }
}

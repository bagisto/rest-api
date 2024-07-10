<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Response;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;

class ReOrderController extends SalesController
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository) {}


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
}

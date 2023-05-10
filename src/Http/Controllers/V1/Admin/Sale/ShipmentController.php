<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sale;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sale\ShipmentResource;
use Webkul\Sales\Repositories\{OrderItemRepository, OrderRepository, ShipmentRepository};

class ShipmentController extends SaleController
{

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Sales\Repositories\OrderitemRepository  $orderItemRepository
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository
    ) {
        parent::__construct();
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ShipmentRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ShipmentResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        $order = $this->orderRepository->find($orderId);

        if (! $order) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.order')]),
            ]);
        }

        if (! $order->canShip()) {
            return response([
                'message' => __('rest-api::app.sales.shipments.creation-error'),
            ], 400);
        }

        $request->validate([
            'shipment.source'    => 'required',
            'shipment.items.*.*' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        if (! $this->isInventoryValidate($data)) {
            return response([
                'message' => __('rest-api::app.sales.shipments.invalid-qty-error'),
            ], 400);
        }

        $shipment = $this->getRepositoryInstance()->create(array_merge($data, ['order_id' => $orderId]));

        return response([
            'data'    => new ShipmentResource($shipment),
            'message' => __('rest-api::app.common-response.success.create', ['name' => ['name' => __('rest-api::app.common-response.general.shipment')]]),
        ]);
    }

    /**
     * Checks if requested quantity available or not.
     *
     * @param  array  $data
     * @return bool
     */
    public function isInventoryValidate(&$data)
    {
        if (! isset($data['shipment']['items'])) {
            return;
        }

        $valid = false;

        $inventorySourceId = $data['shipment']['source'];

        foreach ($data['shipment']['items'] as $itemId => $inventorySource) {
            $qty = $inventorySource[$inventorySourceId];

            if ((int) $qty) {
                $orderItem = $this->orderItemRepository->find($itemId);

                if ($orderItem->qty_to_ship < $qty) {
                    return false;
                }

                if ($orderItem->getTypeInstance()->isComposite()) {
                    foreach ($orderItem->children as $child) {
                        if (! $child->qty_ordered) {
                            continue;
                        }

                        $finalQty = ($child->qty_ordered / $orderItem->qty_ordered) * $qty;

                        $availableQty = $child->product->inventories()
                            ->where('inventory_source_id', $inventorySourceId)
                            ->sum('qty');

                        if ($child->qty_to_ship < $finalQty || $availableQty < $finalQty) {
                            return false;
                        }
                    }
                } else {
                    $availableQty = $orderItem->product->inventories()
                        ->where('inventory_source_id', $inventorySourceId)
                        ->sum('qty');

                    if ($orderItem->qty_to_ship < $qty || $availableQty < $qty) {
                        return false;
                    }
                }

                $valid = true;
            } else {
                unset($data['shipment']['items'][$itemId]);
            }
        }

        return $valid;
    }
}

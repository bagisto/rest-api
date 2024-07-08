<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Sales;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Sales\ShipmentResource;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\ShipmentRepository;

class ShipmentController extends SalesController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository
    ) {}

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ShipmentRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ShipmentResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $orderId): \Illuminate\Http\Response
    {
        $order = $this->orderRepository->findOrFail($orderId);

        if (! $order->canShip()) {
            return response([
                'message' => trans('rest-api::app.admin.sales.shipments.error.creation-error'),
            ], 400);
        }

        $request->validate([
            'shipment.source'    => 'required',
            'shipment.items.*.*' => 'required|numeric|min:0',
        ]);

        $data = array_merge(request()->only([
            'shipment', 
            'carrier_title',
            'source',
            'items',
        ]), [
            'order_id' => $orderId
        ]);

        if (! $this->isInventoryValidate($data)) {
            return response([
                'message' => trans('rest-api::app.admin.sales.shipments.error.invalid-qty-error'),
            ], 400);
        }

        $shipment = $this->getRepositoryInstance()->create(array_merge($data, [
            'order_id' => $orderId,
        ]));

        return response([
            'data'    => new ShipmentResource($shipment->refresh()),
            'message' => trans('rest-api::app.admin.sales.shipments.create-success'),
        ]);
    }

    /**
     * Checks if requested quantity available or not.
     */
    public function isInventoryValidate(array $data): bool
    {
        if (! isset($data['shipment']['items'])) {
            return false;
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

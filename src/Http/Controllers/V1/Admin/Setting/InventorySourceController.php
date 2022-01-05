<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Support\Facades\Event;
use Webkul\Inventory\Http\Requests\InventorySourceRequest;
use Webkul\Inventory\Repositories\InventorySourceRepository;

class InventorySourceController extends SettingController
{
    /**
     * Inventory source repository instance.
     *
     * @var \Webkul\Inventory\Repositories\InventorySourceRepository
     */
    protected $inventorySourceRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Inventory\Repositories\InventorySourceRepository  $inventorySourceRepository
     * @return void
     */
    public function __construct(InventorySourceRepository $inventorySourceRepository)
    {
        $this->inventorySourceRepository = $inventorySourceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventorySources = $this->inventorySourceRepository->all();

        return response([
            'data' => $inventorySources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(InventorySourceRequest $inventorySourceRequest)
    {
        $data = $inventorySourceRequest->all();

        $data['status'] = ! isset($data['status']) ? 0 : 1;

        Event::dispatch('inventory.inventory_source.create.before');

        $inventorySource = $this->inventorySourceRepository->create($data);

        Event::dispatch('inventory.inventory_source.create.after', $inventorySource);

        return response([
            'data'    => $inventorySource,
            'message' => trans('admin::app.settings.inventory_sources.create-success'),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventorySource = $this->inventorySourceRepository->findOrFail($id);

        return response([
            'data' => $inventorySource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventorySourceRequest $inventorySourceRequest, $id)
    {
        $data = $inventorySourceRequest->all();

        $data['status'] = ! isset($data['status']) ? 0 : 1;

        Event::dispatch('inventory.inventory_source.update.before', $id);

        $inventorySource = $this->inventorySourceRepository->update($data, $id);

        Event::dispatch('inventory.inventory_source.update.after', $inventorySource);

        return response([
            'data'    => $inventorySource,
            'message' => trans('admin::app.settings.inventory_sources.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventorySource = $this->inventorySourceRepository->findOrFail($id);

        if ($this->inventorySourceRepository->count() == 1) {
            return response([
                'message' => trans('admin::app.settings.inventory_sources.last-delete-error'),
            ], 400);
        }

        try {
            Event::dispatch('inventory.inventory_source.delete.before', $id);

            $this->inventorySourceRepository->delete($id);

            Event::dispatch('inventory.inventory_source.delete.after', $id);

            return response([
                'message' => trans('admin::app.settings.inventory_sources.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Inventory source']),
        ], 400);
    }
}

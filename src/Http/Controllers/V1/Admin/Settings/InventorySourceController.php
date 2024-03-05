<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\InventorySourceRequest;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\InventorySourceResource;

class InventorySourceController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return InventorySourceRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return InventorySourceResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(InventorySourceRequest $inventorySourceRequest)
    {
        Event::dispatch('inventory.inventory_source.create.before');

        $data = request()->only([
            'code',
            'name',
            'description',
            'latitude',
            'longitude',
            'priority',
            'contact_name',
            'contact_email',
            'contact_number',
            'contact_fax',
            'country',
            'state',
            'city',
            'street',
            'postcode',
            'status',
        ]);

        $inventorySource = $this->getRepositoryInstance()->create($data);

        Event::dispatch('inventory.inventory_source.create.after', $inventorySource);

        return response([
            'data'    => new InventorySourceResource($inventorySource),
            'message' => trans('rest-api::app.admin.settings.inventory-sources.create-success'),
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
        Event::dispatch('inventory.inventory_source.update.before', $id);

        if (! $inventorySourceRequest->status) {
            $inventorySourceRequest['status'] = 0;
        }

        $data = $inventorySourceRequest->only([
            'code',
            'name',
            'description',
            'latitude',
            'longitude',
            'priority',
            'contact_name',
            'contact_email',
            'contact_number',
            'contact_fax',
            'country',
            'state',
            'city',
            'street',
            'postcode',
            'status',
        ]);

        $inventorySource = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('inventory.inventory_source.update.after', $inventorySource);

        return response([
            'data'    => new InventorySourceResource($inventorySource),
            'message' => trans('rest-api::app.admin.settings.inventory-sources.update-success'),
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
        $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count() === 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.inventory-sources.error.last-item-delete-success'),
            ], 400);
        }

        Event::dispatch('inventory.inventory_source.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('inventory.inventory_source.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.inventory-sources.delete-success'),
        ]);
    }
}

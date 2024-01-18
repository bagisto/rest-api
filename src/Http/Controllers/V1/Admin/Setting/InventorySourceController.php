<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Webkul\Admin\Http\Requests\InventorySourceRequest;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Inventory\InventorySourceResource;

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
        $data = $inventorySourceRequest->all();

        $data['status'] = ! isset($data['status']) ? 0 : 1;

        $inventorySource = $this->getRepositoryInstance()->create($data);

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
        $data = $inventorySourceRequest->all();

        $data['status'] = ! isset($data['status']) ? 0 : 1;

        $inventorySource = $this->getRepositoryInstance()->update($data, $id);

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

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.inventory-sources.error.last-item-delete-success'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.admin.settings.inventory-sources.delete-success'),
        ]);
    }
}

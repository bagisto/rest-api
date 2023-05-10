<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Webkul\Inventory\Http\Requests\InventorySourceRequest;
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
            'message' => __('rest-api::app.common-response.success.create', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
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

        $data['status'] = !isset($data['status']) ? 0 : 1;

        $inventorySource = $this->getRepositoryInstance()->find($id);

        if (! $inventorySource) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
            ]);
        }

        $inventorySource = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new InventorySourceResource($inventorySource),
            'message' => __('rest-api::app.common-response.success.update', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
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
        $inventorySource = $this->getRepositoryInstance()->find($id);

        if (!$inventorySource) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
            ]);
        }

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => __('rest-api::app.common-response.error.last-item-delete', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => __('rest-api::app.common-response.general.inventory-source')]),
        ]);
    }
}

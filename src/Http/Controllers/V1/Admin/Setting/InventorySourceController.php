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
       
        $data['status'] = $data['status'] ?? 0;

        $inventorySource = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new InventorySourceResource($inventorySource),
            'message' => trans('rest-api::app.common-response.setting-inventory.create'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(InventorySourceRequest $inventorySourceRequest, int $id)
    {
        $data = $inventorySourceRequest->all();

        $data['status'] = $data['status'] ?? 0;

        $inventorySource = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new InventorySourceResource($inventorySource),
            'message' => trans('rest-api::app.common-response.setting-inventory.update'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count()) {
            return response([
                'message' => trans('rest-api::app.common-response.setting-inventory.error.last-item-delete'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.common-response..setting-inventory.delete'),
        ]);
    }
}

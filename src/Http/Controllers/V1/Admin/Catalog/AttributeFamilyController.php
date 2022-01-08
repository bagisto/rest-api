<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\AttributeFamilyResource;

class AttributeFamilyController extends CatalogController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return AttributeFamilyRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return AttributeFamilyResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:attribute_families,code', new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        $attributeFamily = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Family']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => ['required', 'unique:attribute_families,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        $attributeFamily = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Family']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attributeFamily = $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => __('rest-api::app.common-response.error.last-item-delete', ['name' => 'Family']),
            ], 400);
        }

        if ($attributeFamily->products()->count()) {
            return response([
                'message' => __('rest-api::app.common-response.error.being-used', ['name' => 'Family', 'source' => 'Product']),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Family']),
        ]);
    }
}

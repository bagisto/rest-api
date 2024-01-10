<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Core\Rules\Code;
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
            'code' => ['required', 'unique:attribute_families,code', new Code],
            'name' => 'required',
        ]);

        $attributeFamily = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => trans('rest-api::app.common-response.attribute-family.create'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
            
        $requestData = $request->all();

        unset($requestData['code']);

        $attributeFamily = $this->getRepositoryInstance()->update($requestData, $id);

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => trans('rest-api::app.common-response.attribute-family.update'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $attributeFamily = $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count() === 1) {
            return response([
                'message' => trans('rest-api::app.common-response.attribute-family.error.last-item-delete'),
            ], 400);
        }

        if ($attributeFamily->products()->count()) {
            return response([
                'message' => trans('rest-api::app.common-response.attribute-family.error.being-used'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.common-response.attribute-family.delete'),
        ]);
    }
}

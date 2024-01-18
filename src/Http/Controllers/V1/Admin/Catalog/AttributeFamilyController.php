<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Rules\Code;
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
            'message' => trans('rest-api::app.admin.catalog.families.create-success'),
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
            'code' => ['required', 'unique:attribute_families,code,' . $id, new Code],
            'name' => 'required',
        ]);

        $attributeFamily = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => trans('rest-api::app.admin.catalog.families.update-success'),
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
                'message' => trans('rest-api::app.admin.catalog.families.error.last-item-delete'),
            ], 400);
        }

        if ($attributeFamily->products()->count()) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.families.error.being-used'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.families.delete-success'),
        ]);
    }
}

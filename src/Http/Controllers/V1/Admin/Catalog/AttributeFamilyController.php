<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Support\Facades\Event;
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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'code'                      => ['required', 'unique:attribute_families,code', new Code],
            'name'                      => 'required',
            'attribute_groups.*.code'   => 'required',
            'attribute_groups.*.name'   => 'required',
            'attribute_groups.*.column' => 'required|in:1,2',
        ]);

        Event::dispatch('catalog.attribute_family.create.before');

        $attributeFamily = $this->getRepositoryInstance()->create([
            'attribute_groups'=> request('attribute_groups'),
            'code'            => request('code'),
            'name'            => request('name'),
        ]);

        Event::dispatch('catalog.attribute_family.create.after', $attributeFamily);

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => trans('rest-api::app.admin.catalog.families.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'code'                      => ['required', 'unique:attribute_families,code,'.$id, new Code],
            'name'                      => 'required',
            'attribute_groups.*.code'   => 'required',
            'attribute_groups.*.name'   => 'required',
            'attribute_groups.*.column' => 'required|in:1,2',
        ]);

        $data = request()->only([
            'attribute_groups',
            'name',
        ]);

        Event::dispatch('catalog.attribute_family.update.before', $id);

        $attributeFamily = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('catalog.attribute_family.update.after', $attributeFamily);

        return response([
            'data'    => new AttributeFamilyResource($attributeFamily),
            'message' => trans('rest-api::app.admin.catalog.families.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
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

        Event::dispatch('catalog.attribute_family.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('catalog.attribute_family.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.families.delete-success'),
        ]);
    }
}

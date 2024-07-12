<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\AttributeResource;

class AttributeController extends CatalogController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return AttributeRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return AttributeResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'code'          => ['required', 'not_in:type,attribute_family_id', 'unique:attributes,code', new Code()],
            'admin_name'    => 'required',
            'type'          => 'required',
            'default_value' => 'integer',
        ]);

        $data = request()->all();

        $data['default_value'] ??= null;

        Event::dispatch('catalog.attribute.create.before');

        $attribute = $this->getRepositoryInstance()->create($data);

        Event::dispatch('catalog.attribute.create.after', $attribute);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => trans('rest-api::app.admin.catalog.attributes.create-success'),
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
            'code'          => ['required', 'unique:attributes,code,'.$id, new Code],
            'admin_name'    => 'required',
            'type'          => 'required',
            'default_value' => 'integer',
        ]);

        $data = request()->all();

        $attribute = $this->getRepositoryInstance()->findOrFail($id);

        if ($attribute->type != request()->input('type')) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.attributes.error.cannot-change-type'),
            ], 400);
        }

        $data['default_value'] ??= null;

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.attribute.update.before', $id);

        $attribute = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('catalog.attribute.update.after', $attribute);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => trans('rest-api::app.admin.catalog.attributes.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $attribute = $this->getRepositoryInstance()->findOrFail($id);

        if (! $attribute->is_user_defined) {
            return response([
                'message' => trans('rest-api::app.admin.catalog.attributes.error.system-attributes.delete'),
            ], 400);
        }

        Event::dispatch('catalog.attribute.delete.before', $id);

        $attribute->delete();

        Event::dispatch('catalog.attribute.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.attributes.delete-success'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        $indices = $request->indices;

        foreach ($indices as $index) {
            $attribute = $this->getRepositoryInstance()->findOrFail($index);

            if (! $attribute->is_user_defined) {
                return response([
                    'message' => trans('rest-api::app.admin.catalog.attributes.error.system-attributes-delete'),
                ], 400);
            }
        }

        foreach ($indices as $index) {
            Event::dispatch('catalog.attribute.delete.before', $index);

            $this->getRepositoryInstance()->delete($index);

            Event::dispatch('catalog.attribute.delete.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.catalog.attributes.delete-success'),
        ]);
    }
}

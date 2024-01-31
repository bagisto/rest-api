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
     *
     * @return string
     */
    public function repository()
    {
        return AttributeRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
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

        $data = request()->only([
            'admin_name',
            'type',
            'code',
            'position',
            'default_value',
            'is_comparable',
            'is_configurable',
            'is_required',
            'is_unique',
            'is_filterable',
            'is_user_defined',
            'is_visible_on_front',
            'value_per_locale',
            'value_per_channel',
        ]);

        $data['is_user_defined'] = 1;

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
            'admin_name'    => 'required',
            'default_value' => 'integer',
            'type'          => 'required',
        ]);

        $data = request()->only([
            'admin_name',
            'type',
            'position',
            'default_value',
            'is_comparable',
            'is_configurable',
            'is_required',
            'is_unique',
            'is_filterable',
            'is_user_defined',
            'is_visible_on_front',
            'value_per_locale',
            'value_per_channel',
        ]);

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

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('catalog.attribute.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.catalog.attributes.delete-success'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
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

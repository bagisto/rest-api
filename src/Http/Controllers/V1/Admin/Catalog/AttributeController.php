<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Rules\Code;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Attribute\Repositories\AttributeRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'       => ['required', 'unique:attributes,code', new Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $data = $request->all();

        $data['is_user_defined'] = 1;

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'       => ['required', 'unique:attributes,code,' . $id, new \Webkul\Core\Rules\Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('catalog.attribute.update.before', $id);

        $attribute = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('catalog.attribute.update.after', $attribute);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => trans('rest-api::app.admin.catalog.attributes.update-success'),
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
        $indexes = $request->indexes;

        foreach ($indexes as $index) {
            $attribute = $this->getRepositoryInstance()->findOrFail($index);

            if (! $attribute->is_user_defined) {
                return response([
                    'message' => trans('rest-api::app.admin.catalog.attributes.error.system-attribute-delete'),
                ], 400);
            }
        }

        foreach ($indexes as $index) {
            Event::dispatch('catalog.attribute.delete.before', $index);

            $this->getRepositoryInstance()->delete($index);
            
            Event::dispatch('catalog.attribute.delete.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.catalog.attributes.delete-success'),
        ]);
    }
}

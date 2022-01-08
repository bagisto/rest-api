<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Core\Http\Requests\MassDestroyRequest;
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
            'code'       => ['required', 'unique:attributes,code', new \Webkul\Core\Contracts\Validations\Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $data = $request->all();

        $data['is_user_defined'] = 1;

        $attribute = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Attribute']),
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
            'code'       => ['required', 'unique:attributes,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $this->getRepositoryInstance()->findOrFail($id);

        $attribute = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Attribute']),
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
                'message' => __('rest-api::app.common-response.error.system-attribute-delete'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Attribute']),
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
                    'message' => __('rest-api::app.common-response.error.system-attribute-delete'),
                ], 400);
            }
        }

        foreach ($indexes as $index) {
            $this->getRepositoryInstance()->delete($index);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'attributes']),
        ]);
    }
}

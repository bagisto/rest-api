<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Core\Rules\Code;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
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
            'code'       => ['required', 'not_in:type,attribute_family_id', 'unique:attributes,code', new Code()],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);
       
        $data['is_user_defined'] = 1;

        $attribute = $this->getRepositoryInstance()->create([
            'code'       => $request->input('code'),
            'admin_name' => $request->input('admin_name'),
            'type'       => $request->input('type'),
        ]);

        return response([
            'data'    => new AttributeResource($attribute),
            'message' => trans('rest-api::app.common-response.attributes.create'),
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
            'admin_name' => 'required',
        ]);

        $requestData = $request->all();

        unset($requestData['code']);
 
        $this->getRepositoryInstance()->findOrFail($id);
       
        $attribute = $this->getRepositoryInstance()->update($requestData, $id);
        
        return response([
            'data'    => new AttributeResource($attribute),
            'message' => trans('rest-api::app.common-response.attributes.update'),
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
        $attribute = $this->getRepositoryInstance()->findOrFail($id);

        if (! $attribute->is_user_defined) {
            return response([
                'message' => trans('rest-api::app.common-response.attributes.error.system-attribute-delete'),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.common-response.attributes.delete'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  Webkul\Admin\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        $indices = $request->indices;

        foreach ($indices as $index) {
            $attribute = $this->getRepositoryInstance()->findOrFail($index);

            if (! $attribute->is_user_defined) {
                return response([
                    'message' => trans('rest-api::app.common-response.attributes.error.system-attribute-delete'),
                ], 400);
            }
        }

        foreach ($indices as $index) {
            $this->getRepositoryInstance()->delete($index);
        }

        return response([
            'message' => trans('rest-api::app.common-response.attributes.success.mass-operations.delete'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Catalog;

use Illuminate\Http\Request;
use Webkul\Attribute\Repositories\AttributeRepository;

class AttributeController extends CatalogController
{
    /**
     * Attribute repository instance.
     *
     * @var \Webkul\Attribute\Repositories\AttributeRepository
     */
    protected $attributeRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeRepository  $attributeRepository
     * @return void
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = $this->attributeRepository->all();

        return response([
            'data' => $attributes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'code'       => ['required', 'unique:attributes,code', new \Webkul\Core\Contracts\Validations\Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $data = request()->all();

        $data['is_user_defined'] = 1;

        $attribute = $this->attributeRepository->create($data);

        return response([
            'data'    => $attribute,
            'message' => __('admin::app.response.create-success', ['name' => 'Attribute']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $attribute = $this->attributeRepository->findOrFail($id);

        return response([
            'data' => $attribute,
        ]);
    }

    /**
     * Get attribute options associated with attribute.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAttributeOptions(Request $request, $id)
    {
        $attribute = $this->attributeRepository->findOrFail($id);

        return response([
            'data' => $attribute,
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
        $this->validate(request(), [
            'code'       => ['required', 'unique:attributes,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'admin_name' => 'required',
            'type'       => 'required',
        ]);

        $attribute = $this->attributeRepository->update(request()->all(), $id);

        return response([
            'data'    => $attribute,
            'message' => __('admin::app.response.update-success', ['name' => 'Attribute']),
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
        $attribute = $this->attributeRepository->findOrFail($id);

        if (! $attribute->is_user_defined) {
            return response([
                'message' => __('admin::app.response.user-define-error', ['name' => 'Attribute']),
            ], 400);
        }

        try {
            $this->attributeRepository->delete($id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Attribute']),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => __('admin::app.response.delete-failed', ['name' => 'Attribute']),
            ], 500);
        }
    }

    /**
     * Remove the specified resources from database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        if (request()->isMethod('post')) {
            $indexes = explode(',', request()->input('indexes'));

            foreach ($indexes as $index) {
                $attribute = $this->attributeRepository->find($index);

                if (! $attribute->is_user_defined) {
                    return response([
                        'message' => __('admin::app.response.user-define-error', ['name' => 'Attribute']),
                    ], 400);
                }
            }

            foreach ($indexes as $index) {
                $this->attributeRepository->delete($index);
            }

            return response([
                'message' => __('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'attributes']),
            ]);
        } else {
            return response([
                'message' => __('admin::app.datagrid.mass-ops.method-error'),
            ], 500);
        }
    }
}

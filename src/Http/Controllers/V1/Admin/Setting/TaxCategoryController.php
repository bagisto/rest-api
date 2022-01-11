<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Admin\Tax\TaxCategoryResource;
use Webkul\Tax\Repositories\TaxCategoryRepository;

class TaxCategoryController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return TaxCategoryRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return TaxCategoryResource::class;
    }

    /**
     * Store tax category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|string|unique:tax_categories,code',
            'name'        => 'required|string',
            'description' => 'required|string',
            'taxrates'    => 'array|required',
        ]);

        $data = $request->all();

        $taxCategory = $this->getRepositoryInstance()->create($data);

        $this->getRepositoryInstance()->attachOrDetach($taxCategory, $data['taxrates']);

        return response([
            'data'    => new TaxCategoryResource($taxCategory),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Tax category']),
        ]);
    }

    /**
     * To update the tax category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'        => 'required|string|unique:tax_categories,code,' . $id,
            'name'        => 'required|string',
            'description' => 'required|string',
            'taxrates'    => 'array|required',
        ]);

        $data = $request->input();

        $taxCategory = $this->getRepositoryInstance()->update($data, $id);

        $taxRates = $data['taxrates'];

        $this->getRepositoryInstance()->attachOrDetach($taxCategory, $taxRates);

        return response([
            'data'    => new TaxCategoryResource($taxCategory),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Tax category']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Tax category']),
        ]);
    }
}

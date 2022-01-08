<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
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

        Event::dispatch('tax.tax_category.create.before');

        $taxCategory = $this->getRepositoryInstance()->create($data);

        $this->getRepositoryInstance()->attachOrDetach($taxCategory, $data['taxrates']);

        Event::dispatch('tax.tax_category.create.after', $taxCategory);

        return response([
            'data'    => new TaxCategoryResource($taxCategory),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Tax category']),
        ]);
    }

    /**
     * To update the tax category
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

        Event::dispatch('tax.tax_category.update.before', $id);

        $taxCategory = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('tax.tax_category.update.after', $taxCategory);

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

        Event::dispatch('tax.tax_category.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('tax.tax_category.delete.after', $id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Tax category']),
        ]);
    }
}

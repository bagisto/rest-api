<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings\Tax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Controllers\V1\Admin\Settings\SettingController;
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

        $data = request()->only([
            'code',
            'name',
            'description',
            'taxrates',
        ]);

        Event::dispatch('tax.category.create.before');

        $taxCategory = $this->getRepositoryInstance()->create($data);

        $taxCategory->tax_rates()->sync($data['taxrates']);

        Event::dispatch('tax.category.create.after', $taxCategory);

        return response([
            'data'    => new TaxCategoryResource($this->getRepositoryInstance()->find($taxCategory->id)),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-categories.create-success'),
        ]);
    }

    /**
     * To update the tax category.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'code'        => 'required|string|unique:tax_categories,code,'.$id,
            'name'        => 'required|string',
            'description' => 'required|string',
            'taxrates'    => 'array|required',
        ]);

        $data = request()->only([
            'code',
            'name',
            'description',
            'taxrates',
        ]);

        Event::dispatch('tax.category.update.before', $id);

        $taxCategory = $this->getRepositoryInstance()->update($data, $id);

        $taxCategory->tax_rates()->sync($data['taxrates']);

        Event::dispatch('tax.category.update.after', $taxCategory);

        return response([
            'data'    => new TaxCategoryResource($this->getRepositoryInstance()->find($taxCategory->id)),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-categories.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('tax.category.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('tax.category.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.taxes.tax-categories.delete-success'),
        ]);
    }
}

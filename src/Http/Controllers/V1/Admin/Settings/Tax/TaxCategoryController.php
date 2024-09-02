<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings\Tax;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Controllers\V1\Admin\Settings\SettingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Tax\TaxCategoryResource;
use Webkul\Tax\Models\TaxRate;
use Webkul\Tax\Repositories\TaxCategoryRepository;

class TaxCategoryController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return TaxCategoryRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return TaxCategoryResource::class;
    }

    /**
     * Store tax category.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'code'        => 'required|string|unique:tax_categories,code',
            'name'        => 'required|string',
            'description' => 'required|string',
            'taxrates'    => 'array|required',
        ]);

        $data = $request->only([
            'code',
            'name',
            'description',
            'taxrates',
        ]);

        $taxRates = TaxRate::whereIn('id', $data['taxrates'])->get();

        if ($taxRates->count() !== count($data['taxrates'])) {
            return response([
                'message' => trans('rest-api::app.admin.settings.taxes.tax-categories.error'),
            ], 400);
        }

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
     */
    public function update(Request $request, int $id): Response
    {
        $request->validate([
            'code'        => 'required|string|unique:tax_categories,code,'.$id,
            'name'        => 'required|string',
            'description' => 'required|string',
            'taxrates'    => 'array|required',
        ]);

        $data = $request->only([
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
     */
    public function destroy(int $id): Response
    {
        $taxCategory = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('tax.category.delete.before', $id);

        $taxCategory->delete();

        Event::dispatch('tax.category.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.taxes.tax-categories.delete-success'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings\Tax;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Controllers\V1\Admin\Settings\SettingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Tax\TaxRateResource;
use Webkul\Tax\Repositories\TaxRateRepository;

class TaxRateController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return TaxRateRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return TaxRateResource::class;
    }

    /**
     * Create the tax rate.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'identifier' => 'required|string|unique:tax_rates,identifier',
            'is_zip'     => 'sometimes',
            'zip_code'   => 'nullable',
            'zip_from'   => 'nullable|required_with:is_zip',
            'zip_to'     => 'nullable|required_with:is_zip,zip_from',
            'country'    => 'required|string',
            'tax_rate'   => 'required|numeric|min:0.0001',
        ]);

        Event::dispatch('tax.rate.create.before');

        $taxRate = $this->getRepositoryInstance()->create($request->only([
            'identifier',
            'country',
            'state',
            'tax_rate',
            'zip_code',
            'is_zip',
            'zip_from',
            'zip_to',
        ]));

        Event::dispatch('tax.rate.create.after', $taxRate);

        return response([
            'data'    => new TaxRateResource($taxRate),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.create-success'),
        ]);
    }

    /**
     * Edit the previous tax rate.
     */
    public function update(Request $request, int $id): Response
    {
        $request->validate([
            'identifier' => 'required|string|unique:tax_rates,identifier,'.$id,
            'is_zip'     => 'sometimes',
            'zip_from'   => 'nullable|required_with:is_zip',
            'zip_to'     => 'nullable|required_with:is_zip,zip_from',
            'country'    => 'required|string',
            'tax_rate'   => 'required|numeric|min:0.0001',
        ]);

        Event::dispatch('tax.rate.update.before', $id);

        $taxRate = $this->getRepositoryInstance()->update($request->only([
            'identifier',
            'country',
            'state',
            'tax_rate',
            'zip_code',
            'is_zip',
            'zip_from',
            'zip_to',
        ]), $id);

        Event::dispatch('tax.rate.update.after', $taxRate);

        return response([
            'data'    => new TaxRateResource($taxRate),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $taxrate = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('tax.rate.delete.before', $id);

        $taxrate->delete();

        Event::dispatch('tax.rate.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.delete-success'),
        ]);
    }
}

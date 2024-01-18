<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\RestApi\Http\Resources\V1\Admin\Tax\TaxRateResource;
use Webkul\Tax\Repositories\TaxRateRepository;

class TaxRateController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return TaxRateRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return TaxRateResource::class;
    }

    /**
     * Create the tax rate.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $data = $request->all();

        if (isset($data['is_zip'])) {
            $data['is_zip'] = 1;

            unset($data['zip_code']);
        }

        Event::dispatch('tax.rate.create.before');

        $taxRate = $this->getRepositoryInstance()->create($data);

        Event::dispatch('tax.rate.create.after', $taxRate);

        return response([
            'data'    => new TaxRateResource($taxRate),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.create-success'),
        ]);
    }

    /**
     * Edit the previous tax rate.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'identifier' => 'required|string|unique:tax_rates,identifier,' . $id,
            'is_zip'     => 'sometimes',
            'zip_from'   => 'nullable|required_with:is_zip',
            'zip_to'     => 'nullable|required_with:is_zip,zip_from',
            'country'    => 'required|string',
            'tax_rate'   => 'required|numeric|min:0.0001',
        ]);

        Event::dispatch('tax.rate.update.before', $id);

        $taxRate = $this->getRepositoryInstance()->update($request->input(), $id);

        Event::dispatch('tax.rate.update.after', $taxRate);

        return response([
            'data'    => new TaxRateResource($taxRate),
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.update-success'),
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

        Event::dispatch('tax.rate.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('tax.rate.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.taxes.tax-rates.delete-success'),
        ]);
    }
}

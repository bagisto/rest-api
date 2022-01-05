<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Tax\Repositories\TaxRateRepository;

class TaxRateController extends SettingController
{
    /**
     * Tax rate repository instance.
     *
     * @var \Webkul\Tax\Repositories\TaxRateRepository
     */
    protected $taxRateRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Tax\Repositories\TaxRateRepository  $taxRateRepository
     * @return void
     */
    public function __construct(TaxRateRepository $taxRateRepository)
    {
        $this->taxRateRepository = $taxRateRepository;
    }

    /**
     * Display a listing resource for the available tax rates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxRates = $this->taxRateRepository->all();

        return response([
            'data' => $taxRates,
        ]);
    }

    /**
     * Create the tax rate.
     *
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

        Event::dispatch('tax.tax_rate.create.before');

        $taxRate = $this->taxRateRepository->create($data);

        Event::dispatch('tax.tax_rate.create.after', $taxRate);

        return response([
            'data'    => $taxRate,
            'message' => trans('admin::app.settings.tax-rates.create-success'),
        ]);
    }

    /**
     * Show the edit form for the previously created tax rates.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxRate = $this->taxRateRepository->findOrFail($id);

        return response([
            'data' => $taxRate,
        ]);
    }

    /**
     * Edit the previous tax rate.
     *
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

        Event::dispatch('tax.tax_rate.update.before', $id);

        $taxRate = $this->taxRateRepository->update($request->input(), $id);

        Event::dispatch('tax.tax_rate.update.after', $taxRate);

        return response([
            'data'    => $taxRate,
            'message' => trans('admin::app.settings.tax-rates.update-success'),
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
        $this->taxRateRepository->findOrFail($id);

        try {
            Event::dispatch('tax.tax_rate.delete.before', $id);

            $this->taxRateRepository->delete($id);

            Event::dispatch('tax.tax_rate.delete.after', $id);

            return response([
                'message' => trans('admin::app.response.delete-success', ['name' => 'Tax Rate']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Tax Rate']),
        ], 400);
    }
}

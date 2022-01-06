<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Tax\Repositories\TaxCategoryRepository;
use Webkul\Tax\Repositories\TaxRateRepository;

class TaxCategoryController extends SettingController
{
    /**
     * Tax category repository instance.
     *
     * @var \Webkul\Tax\Repositories\TaxCategoryRepository
     */
    protected $taxCategoryRepository;

    /**
     * Tax rate repository instance.
     *
     * @var \Webkul\Tax\Repositories\TaxRateRepository
     */
    protected $taxRateRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Tax\Repositories\TaxCategoryRepository  $taxCategoryRepository
     * @param  \Webkul\Tax\Repositories\TaxRateRepository  $taxRateRepository
     * @return void
     */
    public function __construct(
        TaxCategoryRepository $taxCategoryRepository,
        TaxRateRepository $taxRateRepository
    ) {
        $this->taxCategoryRepository = $taxCategoryRepository;

        $this->taxRateRepository = $taxRateRepository;
    }

    /**
     * All tax categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxCategories = $this->taxCategoryRepository->all();

        return response([
            'data' => $taxCategories,
        ]);
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

        $taxCategory = $this->taxCategoryRepository->create($data);

        $this->taxCategoryRepository->attachOrDetach($taxCategory, $data['taxrates']);

        Event::dispatch('tax.tax_category.create.after', $taxCategory);

        return response([
            'message' => __('admin::app.settings.tax-categories.create-success'),
        ]);
    }

    /**
     * To show the tax category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxCategory = $this->taxCategoryRepository->findOrFail($id);

        return response([
            'data' => $taxCategory,
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

        $taxCategory = $this->taxCategoryRepository->update($data, $id);

        Event::dispatch('tax.tax_category.update.after', $taxCategory);

        if (! $taxCategory) {
            return response([
                'message' => __('admin::app.settings.tax-categories.update-error'),
            ], 400);
        }

        $taxRates = $data['taxrates'];

        $this->taxCategoryRepository->attachOrDetach($taxCategory, $taxRates);

        return response([
            'data'    => $taxCategory,
            'message' => __('admin::app.settings.tax-categories.update-success'),
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
        $this->taxCategoryRepository->findOrFail($id);

        try {
            Event::dispatch('tax.tax_category.delete.before', $id);

            $this->taxCategoryRepository->delete($id);

            Event::dispatch('tax.tax_category.delete.after', $id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Tax Category']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Tax Category']),
        ], 400);
    }
}

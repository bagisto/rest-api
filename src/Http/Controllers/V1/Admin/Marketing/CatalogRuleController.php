<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\CatalogRule\Repositories\CatalogRuleRepository;

class CatalogRuleController extends MarketingController
{
    /**
     * Catalog repository instance.
     *
     * @var \Webkul\CatalogRule\Repositories\CatalogRuleRepository
     */
    protected $catalogRuleRepository;

    /**
     * Catalog rule index instance.
     *
     * @var \Webkul\CatalogRule\Helpers\CatalogRuleIndex
     */
    protected $catalogRuleIndexHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\CatalogRule\Repositories\CatalogRuleRepository  $catalogRuleRepository
     * @param  \Webkul\CatalogRule\Helpers\CatalogRuleIndex  $catalogRuleIndexHelper
     * @return void
     */
    public function __construct(
        CatalogRuleRepository $catalogRuleRepository,
        CatalogRuleIndex $catalogRuleIndexHelper
    ) {
        $this->catalogRuleRepository = $catalogRuleRepository;

        $this->catalogRuleIndexHelper = $catalogRuleIndexHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogRules = $this->catalogRuleRepository->all();

        return response([
            'data' => $catalogRules,
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
        $request->validate([
            'name'            => 'required',
            'channels'        => 'required|array|min:1',
            'customer_groups' => 'required|array|min:1',
            'starts_from'     => 'nullable|date',
            'ends_till'       => 'nullable|date|after_or_equal:starts_from',
            'action_type'     => 'required',
            'discount_amount' => 'required|numeric',
        ]);

        $data = $request->all();

        Event::dispatch('promotions.catalog_rule.create.before');

        $catalogRule = $this->catalogRuleRepository->create($data);

        Event::dispatch('promotions.catalog_rule.create.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => $catalogRule,
            'message' => __('admin::app.response.create-success', ['name' => 'Catalog Rule']),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogRule = $this->catalogRuleRepository->findOrFail($id);

        return response([
            'data' => $catalogRule,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required',
            'channels'        => 'required|array|min:1',
            'customer_groups' => 'required|array|min:1',
            'starts_from'     => 'nullable|date',
            'ends_till'       => 'nullable|date|after_or_equal:starts_from',
            'action_type'     => 'required',
            'discount_amount' => 'required|numeric',
        ]);

        $catalogRule = $this->catalogRuleRepository->findOrFail($id);

        Event::dispatch('promotions.catalog_rule.update.before', $catalogRule);

        $catalogRule = $this->catalogRuleRepository->update($request->all(), $id);

        Event::dispatch('promotions.catalog_rule.update.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => $catalogRule,
            'message' => __('admin::app.response.update-success', ['name' => 'Catalog Rule']),
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
        $catalogRule = $this->catalogRuleRepository->findOrFail($id);

        try {
            Event::dispatch('promotions.catalog_rule.delete.before', $id);

            $this->catalogRuleRepository->delete($id);

            Event::dispatch('promotions.catalog_rule.delete.after', $id);

            return response([
                'message' => __('admin::app.response.delete-success', ['name' => 'Catalog Rule']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Catalog Rule']),
        ], 400);
    }
}

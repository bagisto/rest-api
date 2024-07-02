<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\CatalogRule\Repositories\CatalogRuleRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Promotions\CatalogRuleResource;

class CatalogRuleController extends MarketingController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CatalogRuleIndex $catalogRuleIndexHelper)
    {
        parent::__construct();
    }

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CatalogRuleRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CatalogRuleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
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

        Event::dispatch('promotions.catalog_rule.create.before');

        $catalogRule = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('promotions.catalog_rule.create.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rule.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
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

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.catalog_rule.update.before', $id);

        $catalogRule = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('promotions.catalog_rule.update.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rules.update-success'),
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

        Event::dispatch('promotions.catalog_rule.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('promotions.catalog_rule.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rules.delete-success'),
        ]);
    }
}

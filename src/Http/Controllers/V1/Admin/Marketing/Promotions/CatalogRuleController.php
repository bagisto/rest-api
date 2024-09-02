<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\Admin\Http\Requests\CatalogRuleRequest;
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
    public function __construct(protected CatalogRuleIndex $catalogRuleIndexHelper) {}

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
     */
    public function store(CatalogRuleRequest $catalogRuleRequest): Response
    {
        Event::dispatch('promotions.catalog_rule.create.before');

        $catalogRule = $this->getRepositoryInstance()->create($catalogRuleRequest->all());

        Event::dispatch('promotions.catalog_rule.create.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rules.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatalogRuleRequest $catalogRuleRequest, int $id): Response
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.catalog_rule.update.before', $id);

        $catalogRule = $this->getRepositoryInstance()->update($catalogRuleRequest->all(), $id);

        Event::dispatch('promotions.catalog_rule.update.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule->refresh()),
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rule.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $catalogRule = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.catalog_rule.delete.before', $id);

        $catalogRule->delete();

        Event::dispatch('promotions.catalog_rule.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rules.delete-success'),
        ]);
    }
}

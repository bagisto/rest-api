<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\CatalogRule\Repositories\CatalogRuleRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CatalogRuleResource;

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
     *
     * @return string
     */
    public function repository()
    {
        return CatalogRuleRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
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

        $data = $request->all();

        /**
         * These two keys needs to be removed in the next version compatibility.
         *
         * @deprecated
         */
        $data['starts_from'] = ! empty($data['starts_from']) ? $data['starts_from'] : null;
        $data['ends_till'] = ! empty($data['ends_till']) ? $data['ends_till'] : null;

        $catalogRule = $this->getRepositoryInstance()->create($data);

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
     * @param  int  $id
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

        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.catalog_rule.update.before', $id);

        $data = $request->all();

        /**
         * These two keys needs to be removed in the next version compatibility.
         *
         * @deprecated
         */
        $data['starts_from'] = ! empty($data['starts_from']) ? $data['starts_from'] : null;
        $data['ends_till'] = ! empty($data['ends_till']) ? $data['ends_till'] : null;

        $catalogRule = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('promotions.catalog_rule.update.after', $catalogRule);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rule.update-success'),
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

        Event::dispatch('promotions.catalog_rule.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('promotions.catalog_rule.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.catalog-rule.delete-success'),
        ]);
    }
}

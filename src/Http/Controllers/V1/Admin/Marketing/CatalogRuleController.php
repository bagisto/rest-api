<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\CatalogRule\Repositories\CatalogRuleRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CatalogRuleResource;

class CatalogRuleController extends MarketingController
{
    /**
     * Catalog rule index instance.
     *
     * @var \Webkul\CatalogRule\Helpers\CatalogRuleIndex
     */
    protected $catalogRuleIndexHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\CatalogRule\Helpers\CatalogRuleIndex  $catalogRuleIndexHelper
     * @return void
     */
    public function __construct(
        CatalogRuleIndex $catalogRuleIndexHelper
    ) {
        parent::__construct();
        
        $this->catalogRuleIndexHelper = $catalogRuleIndexHelper;
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

        $catalogRule = $this->getRepositoryInstance()->create($request->all());

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Catalog rule']),
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

        $this->getRepositoryInstance()->findOrFail($id);

        $catalogRule = $this->getRepositoryInstance()->update($request->all(), $id);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Catalog rule']),
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

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Catalog rule']),
        ]);
    }
}

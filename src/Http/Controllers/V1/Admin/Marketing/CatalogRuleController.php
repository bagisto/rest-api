<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
use Webkul\CatalogRule\Repositories\CatalogRuleRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CatalogRuleResource;

class CatalogRuleController extends MarketingController
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\CatalogRule\Helpers\CatalogRuleIndex  $catalogRuleIndexHelper
     * @return void
     */
    public function __construct(
       protected CatalogRuleIndex $catalogRuleIndexHelper
    ) {
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
    
        if(
            array_key_exists('starts_from', $data) 
           || array_key_exists('ends_till', $data)
        ){
            $data['starts_from'] = $data['starts_from'];

            $data['ends_till'] =  $data['ends_till'];
        } else {
            $data['starts_from'] = null;

            $data['ends_till'] = null;
        }

        $catalogRule = $this->getRepositoryInstance()->create($data);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.common-response.success.create'),
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

        $data = $request->all();           
    
        if(
           array_key_exists('starts_from', $data) 
           || array_key_exists('ends_till', $data)
        ){
            $data['starts_from'] = $data['starts_from'];

            $data['ends_till'] =  $data['ends_till'];
        } else {
            $data['starts_from'] = null;

            $data['ends_till'] = null;
        }

        $this->getRepositoryInstance()->findOrFail($id);

        $catalogRule = $this->getRepositoryInstance()->update($data, $id);

        $this->catalogRuleIndexHelper->reindexComplete();

        return response([
            'data'    => new CatalogRuleResource($catalogRule),
            'message' => trans('rest-api::app.common-response.success.update'),
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
            'message' => trans('rest-api::app.common-response.success.delete'),
        ]);
    }
}

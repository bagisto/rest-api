<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO;

use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Marketing\Repositories\SearchTermRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchTermsResource;

class SearchTermsController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return SearchTermRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return SearchTermsResource::class;
    }

    /**
     * Store a newly created resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'term'         => 'required',
            'redirect_url' => 'url:http,https',
            'channel_id'   => 'required|exists:channels,id',
            'locale'       => 'required|exists:locales,code',
        ]);

        Event::dispatch('marketing.search_seo.search_terms.create.before');

        $searchTerm = $this->getRepositoryInstance()->create(request()->only([
            'term',
            'redirect_url',
            'channel_id',
            'locale',
        ]));

        Event::dispatch('marketing.search_seo.search_terms.create.after', $searchTerm);

        return response([
            'data'    => new SearchTermsResource($searchTerm),
            'message' => trans('rest-api::app.admin.marketing.search-seo.search-terms.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'term'         => 'required',
            'redirect_url' => 'url:http,https',
            'channel_id'   => 'required|exists:channels,id',
            'locale'       => 'required|exists:locales,code',
        ]);

        Event::dispatch('marketing.search_seo.search_terms.update.before', $id);

        $searchTerm = $this->getRepositoryInstance()->update(request()->only([
            'term',
            'results',
            'uses',
            'redirect_url',
            'channel_id',
            'locale',
        ]), $id);

        Event::dispatch('marketing.search_seo.search_terms.update.after', $searchTerm);

        return response([
            'data'    => new SearchTermsResource($searchTerm),
            'message' => trans('rest-api::app.admin.marketing.search-seo.search-terms.update-success'),
        ]);
    }

    /**
     * Remove the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.search_seo.search_terms.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.search_seo.search_terms.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.search-seo.search-terms.delete-success'),
        ]);
    }

     /**
     * To mass delete the url rewrites.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest)
    {
        $searchTermIds = $massDestroyRequest->input('indices');

        try {
            foreach ($searchTermIds as $searchTermId) {
                Event::dispatch('marketing.search_seo.search_terms.delete.before', $searchTermId);

                $this->getRepositoryInstance()->delete($searchTermId);

                Event::dispatch('marketing.search_seo.search_terms.delete.after', $searchTermId);
            }
    
            return response([
                'message' => trans('rest-api::app.admin.marketing.search-seo.search-terms.mass-operations.delete-success'),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
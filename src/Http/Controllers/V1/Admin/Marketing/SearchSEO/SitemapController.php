<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\Sitemap\Repositories\SitemapRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchSEO\SitemapResource;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;

class SitemapController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return SitemapRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return SitemapResource::class;
    }

    /**
     * Store a newly created resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'file_name' => 'required',
            'path'      => 'required',
        ]);

        Event::dispatch('marketing.search_seo.sitemap.create.before');

        $sitemap = $this->getRepositoryInstance()->create(request()->only([
            'file_name',
            'path',
        ]));

        Event::dispatch('marketing.search_seo.sitemap.create.after', $sitemap);

        return response([
            'data'    => new SitemapResource($sitemap),
            'message' => trans('rest-api::app.admin.marketing.search-seo.sitemaps.create-success'),
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
            'file_name' => 'required',
            'path'      => 'required',
        ]);

        Event::dispatch('marketing.search_seo.sitemap.update.before', $id);

        $sitemap = $this->getRepositoryInstance()->update(request()->only([
            'file_name',
            'path',
        ]), $id);

        Event::dispatch('marketing.search_seo.sitemap.update.after', $sitemap);

        return response([
            'message' => trans('rest-api::app.admin.marketing.search-seo.sitemaps.update-success'),
        ]);
    }

    /**
     * Remove the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $sitemap = $this->getRepositoryInstance()->findOrFail($id);

        Storage::delete($sitemap->path.'/'.$sitemap->file_name);

        Event::dispatch('marketing.search_seo.sitemap.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('marketing.search_seo.sitemap.delete.after', $id);

        return response()->json([
            'message' => trans('rest-api::app.admin.marketing.search-seo.sitemaps.delete-success'),
        ], 200);
    }
}
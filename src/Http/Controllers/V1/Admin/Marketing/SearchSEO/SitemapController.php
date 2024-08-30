<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\Response;
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
     */
    public function store(): Response
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
     */
    public function update(int $id): Response
    {
        $this->validate(request(), [
            'file_name' => 'required',
            'path'      => 'required',
        ]);

        Event::dispatch('marketing.search_seo.sitemap.update.before', $id);

        $this->getRepositoryInstance()->update(request()->only([
            'file_name',
            'path',
        ]), $id);

        $sitemap = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('marketing.search_seo.sitemap.update.after', $sitemap);

        return response([
            'data' => new SitemapResource($sitemap),
            'message' => trans('rest-api::app.admin.marketing.search-seo.sitemaps.update-success'),
        ]);
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(int $id): Response
    {
        $sitemap = $this->getRepositoryInstance()->findOrFail($id);

        Storage::delete($sitemap->path.'/'.$sitemap->file_name);

        Event::dispatch('marketing.search_seo.sitemap.delete.before', $id);

        $sitemap->delete();

        Event::dispatch('marketing.search_seo.sitemap.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.search-seo.sitemaps.delete-success'),
        ], 200);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\CMS;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CMS\Repositories\PageRepository;
use Webkul\Core\Rules\Slug;
use Webkul\RestApi\Http\Resources\V1\Admin\CMS\PageResource;

class PageController extends CMSController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return PageRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return PageResource::class;
    }

    /**
     * To store a new page in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'url_key'      => ['required', 'unique:cms_page_translations,url_key', new Slug],
            'page_title'   => 'required',
            'channels'     => 'required',
            'html_content' => 'required',
        ]);

        Event::dispatch('cms.pages.create.before');

        $page = $this->getRepositoryInstance()->create($request->only([
            'page_title',
            'channels',
            'html_content',
            'meta_title',
            'url_key',
            'meta_keywords',
            'meta_description',
        ]));

        Event::dispatch('cms.pages.create.after', $page);

        return response([
            'data'    => new PageResource($page),
            'message' => trans('rest-api::app.admin.cms.create-success'),
        ]);
    }

    /**
     * To update the previously created page in storage.
     */
    public function update(Request $request, int $id): Response
    {
        $locale = core()->getRequestedLocaleCode();

        $request->validate([
            $locale.'.url_key'     => ['required', new Slug, function ($attribute, $value, $fail) use ($id) {
                if (! $this->getRepositoryInstance()->isUrlKeyUnique($id, $value)) {
                    $fail(trans('rest-api::app.admin.cms.error.already-taken'));
                }
            }],
            $locale.'.page_title'   => 'required',
            $locale.'.html_content' => 'required',
            'channels'              => 'required',
        ]);

        Event::dispatch('cms.pages.update.before', $id);

        $page = $this->getRepositoryInstance()->update([
            $locale    => request()->input($locale),
            'channels' => request()->input('channels'),
            'locale'   => $locale,
        ], $id);

        Event::dispatch('cms.pages.update.after', $page->refresh());

        return response([
            'data'    => new PageResource($page->refresh()),
            'message' => trans('rest-api::app.admin.cms.update-success'),
        ]);
    }

    /**
     * To delete the previously create CMS page.
     */
    public function destroy(int $id): Response
    {
        $page = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('cms.pages.delete.before', $id);

        $page->delete();

        Event::dispatch('cms.pages.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.cms.mass-operations.delete-success'),
        ]);
    }

    /**
     * To mass delete the CMS resource from storage.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): Response
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('cms.pages.delete.before', $index);

            $this->getRepositoryInstance()->delete($index);

            Event::dispatch('cms.pages.delete.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.cms.mass-operations.delete-success'),
        ]);
    }
}

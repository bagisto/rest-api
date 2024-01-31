<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\Core\Rules\Slug;
use Webkul\RestApi\Http\Resources\V1\Admin\CMS\CMSResource;

class PageController extends CMSController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CmsRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CMSResource::class;
    }

    /**
     * To store a new page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url_key'      => ['required', 'unique:cms_page_translations,url_key', new \Webkul\Core\Rules\Slug],
            'page_title'   => 'required',
            'channels'     => 'required',
            'html_content' => 'required',
        ]);

        Event::dispatch('cms.pages.create.before');

        $page = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('cms.pages.create.after', $page);

        return response([
            'data'    => new CMSResource($page),
            'message' => trans('rest-api::app.admin.cms.create-success'),
        ]);
    }

    /**
     * To update the previously created page in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locale = core()->getRequestedLocaleCode();

        $request->validate([
            $locale.'.url_key'      => ['required', new Slug, function ($attribute, $value, $fail) use ($id) {
                if (! $this->getRepositoryInstance()->isUrlKeyUnique($id, $value)) {
                    $fail(trans('rest-api::app.admin.cms.error.already-taken'));
                }
            }],
            $locale.'.page_title'     => 'required',
            $locale.'.html_content'   => 'required',
            'channels'                => 'required',
        ]);

        Event::dispatch('cms.pages.update.before', $id);

        $page = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('cms.pages.update.after', $page);

        return response([
            'data'    => new CMSResource($page),
            'message' => trans('rest-api::app.admin.cms.update-success'),
        ]);
    }

    /**
     * To mass delete the CMS resource from storage.
     */
    public function massDestroy(MassDestroyRequest $request, $id)
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('cms.pages.delete.before', $index);

            $this->cmsRepository->delete($index);

            Event::dispatch('cms.pages.delete.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.cms.mass-operations.delete-success'),
        ]);
    }
}

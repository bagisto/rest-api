<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\CMS;

use Illuminate\Http\Request;
use Webkul\CMS\Repositories\CmsRepository;

class PageController extends CMSController
{
    /**
     * CMS repository instance.
     *
     * @var \Webkul\CMS\Repositories\CmsRepository
     */
    protected $cmsRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\CMS\Repositories\CmsRepository  $cmsRepository
     * @return void
     */
    public function __construct(CmsRepository $cmsRepository)
    {
        $this->cmsRepository = $cmsRepository;
    }

    /**
     * Loads the index page showing the static pages resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->cmsRepository->all();

        return response([
            'data' => $pages,
        ]);
    }

    /**
     * To store a new page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url_key'      => ['required', 'unique:cms_page_translations,url_key', new \Webkul\Core\Contracts\Validations\Slug],
            'page_title'   => 'required',
            'channels'     => 'required',
            'html_content' => 'required',
        ]);

        $page = $this->cmsRepository->create($request->all());

        return response([
            'data'    => $page,
            'message' => __('admin::app.response.create-success', ['name' => 'page']),
        ]);
    }

    /**
     * Show page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->cmsRepository->findOrFail($id);

        return response([
            'data' => $page,
        ]);
    }

    /**
     * To update the previously created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locale = core()->getRequestedLocaleCode();

        $request->validate([
            $locale . '.url_key'      => ['required', new \Webkul\Core\Contracts\Validations\Slug, function ($attribute, $value, $fail) use ($id) {
                if (! $this->cmsRepository->isUrlKeyUnique($id, $value)) {
                    $fail(__('admin::app.response.already-taken', ['name' => 'Page']));
                }
            }],
            $locale . '.page_title'   => 'required',
            $locale . '.html_content' => 'required',
            'channels'                => 'required',
        ]);

        $page = $this->cmsRepository->update($request->all(), $id);

        return response([
            'data'    => $page,
            'message' => __('admin::app.response.update-success', ['name' => 'Page']),
        ]);
    }

    /**
     * To delete the previously created page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->cmsRepository->findOrFail($id);

        if ($page->delete()) {
            return response([
                'message' => __('admin::app.cms.pages.delete-success'),
            ]);
        }

        return response([
            'message' => __('admin::app.cms.pages.delete-failure'),
        ], 400);
    }

    /**
     * To mass delete the resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $data = $request->all();

        if ($data['indexes']) {
            $pageIDs = explode(',', $data['indexes']);

            $count = 0;

            foreach ($pageIDs as $pageId) {
                $page = $this->cmsRepository->find($pageId);

                if ($page) {
                    $page->delete();

                    $count++;
                }
            }

            if (count($pageIDs) == $count) {
                return response([
                    'message' => __('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'CMS Pages']),
                ]);
            }

            return response([
                'message' => __('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'CMS Pages']),
            ]);
        }

        return response([
            'message' => __('admin::app.datagrid.mass-ops.no-resource'),
        ]);
    }
}

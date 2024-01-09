<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\CMS;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'url_key'      => ['required', 'unique:cms_page_translations,url_key', new Slug],
                'page_title'   => 'required',
                'channels'     => 'required',
                'html_content' => 'required',
            ]);

            $page = $this->getRepositoryInstance()->create($request->all());

            return response([
                'data'    => new CMSResource($page),
                'message' => __('rest-api::app.common-response.success.create', ['name' => 'Page']),
            ]);
        } catch( ValidationException $e) {
            return response([
                'erorors' => $e->validator->errors()->toArray(),
            ]);
        }
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
     
        try{
            $request->validate([
                $locale . '.url_key'      => ['required', new Slug, function ($attribute, $value, $fail) use ($id) {
                   if (! $this->getRepositoryInstance()->isUrlKeyUnique($id, $value)) {
                      $fail(__('rest-api::app.common-response.error.already-taken', ['name' => 'Page']));
                    }
                }],
               $locale . '.page_title'   => 'required',
               $locale . '.html_content' => 'required',
               'channels'                => 'required',
            ]);
        } catch(ValidationException $e) {
             return response([
                'errors' => $e->validator->errors()->toArray(),
            ]);
        }

        $page = $this->getRepositoryInstance()->update($request->all(), $id);
     
        return response([
            'data'    => new CMSResource($page),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Page']),
        ]);
    }
}
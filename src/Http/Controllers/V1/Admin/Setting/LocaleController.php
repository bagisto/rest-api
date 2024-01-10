<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\LocaleResource;

class LocaleController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return LocaleRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return LocaleResource::class;
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
            'code'      => ['required', 'unique:locales,code', new Code],
            'name'      => 'required',
            'direction' => 'required |in:ltr,rtl',
        ]);

        $locale = $this->getRepositoryInstance()->create($request->all());
           
        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.common-response.success.create'),
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'code'      => ['required', 'unique:locales,code', new Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $locale = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.common-response.success.update', ['name' => 'Locale']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        if ($this->getRepositoryInstance()->count()) {
            return response([
                'message' => trans('rest-api::app.common-response.error.last-item-delete'),
            ]);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.common-response.success.delete'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\LocaleRepository;
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
            'code'      => ['required', 'unique:locales,code', new \Webkul\Core\Contracts\Validations\Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $locale = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new LocaleResource($locale),
            'message' => __('rest-api::app.common-response.success.create', ['name' => __('rest-api::app.common-response.general.locale')]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'      => ['required', 'unique:locales,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $locale = $this->getRepositoryInstance()->find($id);

        if (! $locale) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.locale')]),
            ]);
        }

        $locale = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => __('rest-api::app.common-response.success.update', ['name' => __('rest-api::app.common-response.general.locale')]),
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
        $locale = $this->getRepositoryInstance()->find($id);

        if (! $locale) {
            return response([
                'message' => __('rest-api::app.common-response.success.not-found', ['name' => __('rest-api::app.common-response.general.locale')]),
            ]);
        }

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => __('rest-api::app.common-response.error.last-item-delete', ['name' => __('rest-api::app.common-response.general.locale')]),
            ]);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => __('rest-api::app.common-response.general.locale')]),
        ]);
    }
}

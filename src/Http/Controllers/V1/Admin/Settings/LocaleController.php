<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\LocaleResource;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'      => ['required', 'unique:locales,code', new Code],
            'name'      => 'required',
            'direction' => ['required', 'in:ltr,rtl'],
        ]);

        $data = request()->only([
            'code',
            'name',
            'direction',
        ]);

        $data['logo_path'] = request()->file('logo_path');

        $locale = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.admin.settings.locales.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'      => ['required', 'unique:locales,code,'.$id, new Code],
            'name'      => 'required',
            'direction' => ['required', 'in:ltr,rtl'],
        ]);

        $data = request()->only([
            'code',
            'name',
            'direction',
        ]);

        $data['logo_path'] = request()->file('logo_path');

        $locale = $this->getRepositoryInstance()->update($data, $id);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.admin.settings.locales.update-success'),
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

        if ($this->getRepositoryInstance()->count() == 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.locales.error.last-item-delete'),
            ]);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => trans('rest-api::app.admin.settings.locales.delete-success'),
        ]);
    }
}

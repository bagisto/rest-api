<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\LocaleResource;

class LocaleController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return LocaleRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return LocaleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'code'        => ['required', 'unique:locales,code', new \Webkul\Core\Rules\Code],
            'name'        => 'required',
            'direction'   => 'required|in:ltr,rtl',
            'logo_path'   => 'array',
            'logo_path.*' => 'image|extensions:jpeg,jpg,png,svg,webp',
        ]);

        $locale = $this->getRepositoryInstance()->create($request->only([
            'code',
            'name',
            'direction',
            'logo_path',
        ]));

        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.admin.settings.locales.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): Response
    {
        $request->validate([
            'name'        => 'required',
            'direction'   => 'required|in:ltr,rtl',
            'logo_path'   => 'array',
            'logo_path.*' => 'image|extensions:jpeg,jpg,png,svg,webp',
        ]);

        $locale = $this->getRepositoryInstance()->update($request->only([
            'code',
            'name',
            'direction',
            'logo_path',
        ]), $id);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => trans('rest-api::app.admin.settings.locales.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $locale = $this->getRepositoryInstance()->findOrFail($id);

        if ($locale->count() == 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.locales.error.last-item-delete'),
            ]);
        }

        $locale->delete();

        return response([
            'message' => trans('rest-api::app.admin.settings.locales.delete-success'),
        ]);
    }
}

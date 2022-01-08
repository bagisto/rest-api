<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
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

        Event::dispatch('core.locale.create.before');

        $locale = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('core.locale.create.after', $locale);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => __('admin::app.settings.locales.create-success'),
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

        Event::dispatch('core.locale.update.before', $id);

        $locale = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('core.locale.update.after', $locale);

        return response([
            'data'    => new LocaleResource($locale),
            'message' => __('admin::app.settings.locales.update-success'),
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
                'message' => __('admin::app.settings.locales.last-delete-error'),
            ]);
        }

        Event::dispatch('core.locale.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('core.locale.delete.after', $id);

        return response([
            'message' => __('admin::app.settings.locales.delete-success'),
        ]);
    }
}

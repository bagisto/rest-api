<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\LocaleRepository;

class LocaleController extends SettingController
{
    /**
     * Locale repository instance.
     *
     * @var \Webkul\Core\Repositories\LocaleRepository
     */
    protected $localeRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\LocaleRepository  $localeRepository
     * @return void
     */
    public function __construct(LocaleRepository $localeRepository)
    {
        $this->localeRepository = $localeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = $this->localeRepository->all();

        return response([
            'data' => $locales,
        ]);
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

        $locale = $this->localeRepository->create($request->all());

        Event::dispatch('core.locale.create.after', $locale);

        return response([
            'data'    => $locale,
            'message' => __('admin::app.settings.locales.create-success'),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locale = $this->localeRepository->findOrFail($id);

        return response([
            'data' => $locale,
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

        $locale = $this->localeRepository->update($request->all(), $id);

        Event::dispatch('core.locale.update.after', $locale);

        return response([
            'data'    => $locale,
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
        $locale = $this->localeRepository->findOrFail($id);

        if ($this->localeRepository->count() == 1) {
            return response([
                'message' => __('admin::app.settings.locales.last-delete-error'),
            ]);
        }

        try {
            Event::dispatch('core.locale.delete.before', $id);

            $this->localeRepository->delete($id);

            Event::dispatch('core.locale.delete.after', $id);

            return response([
                'message' => __('admin::app.settings.locales.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Locale']),
        ], 400);
    }
}

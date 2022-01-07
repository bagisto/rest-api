<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\CurrencyRepository;

class CurrencyController extends SettingController
{
    /**
     * Currency repository instance.
     *
     * @var \Webkul\Core\Repositories\CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\CurrencyRepository  $currencyRepository
     * @return void
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = $this->currencyRepository->all();

        return response([
            'data' => $currencies,
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
            'code' => 'required|min:3|max:3|unique:currencies,code',
            'name' => 'required',
        ]);

        Event::dispatch('core.currency.create.before');

        $currency = $this->currencyRepository->create($request->all());

        Event::dispatch('core.currency.create.after', $currency);

        return response([
            'data'    => $currency,
            'message' => __('admin::app.settings.currencies.create-success'),
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
        $currency = $this->currencyRepository->findOrFail($id);

        return response([
            'data' => $currency,
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
            'code' => ['required', 'unique:currencies,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            'name' => 'required',
        ]);

        Event::dispatch('core.currency.update.before', $id);

        $currency = $this->currencyRepository->update($request->all(), $id);

        Event::dispatch('core.currency.update.after', $currency);

        return response([
            'data'    => $currency,
            'message' => __('admin::app.settings.currencies.update-success'),
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
        $this->currencyRepository->findOrFail($id);

        if ($this->currencyRepository->count() == 1) {
            return response([
                'message' => __('admin::app.settings.currencies.last-delete-error'),
            ], 400);
        }

        try {
            Event::dispatch('core.currency.delete.before', $id);

            $this->currencyRepository->delete($id);

            Event::dispatch('core.currency.delete.after', $id);

            return response()->json([
                'message' => __('admin::app.settings.currencies.delete-success'),
            ], 200);
        } catch (\Exception $e) {}

        return response()->json([
            'message' => __('admin::app.response.delete-failed', ['name' => 'Currency']),
        ], 400);
    }

    /**
     * Remove the specified resources from database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $indexes = explode(',', $request->input('indexes'));

        try {
            foreach ($indexes as $index) {
                Event::dispatch('core.currency.delete.before', $index);

                $this->currencyRepository->delete($index);

                Event::dispatch('core.currency.delete.after', $index);
            }

            return response([
                'message' => __('rest-api::app.response.success.mass-operations.delete', ['name' => 'currencies']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.datagrid.mass-ops.partial-action', ['name' => 'currencies']),
        ], 400);
    }
}

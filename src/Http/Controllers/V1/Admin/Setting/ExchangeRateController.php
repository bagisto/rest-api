<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Repositories\ExchangeRateRepository;

class ExchangeRateController extends SettingController
{
    /**
     * Exchange rate repository instance.
     *
     * @var \Webkul\Core\Repositories\ExchangeRateRepository
     */
    protected $exchangeRateRepository;

    /**
     * Currency repository instance.
     *
     * @var \Webkul\Core\Repositories\CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\ExchangeRateRepository  $exchangeRateRepository
     * @param  \Webkul\Core\Repositories\CurrencyRepository  $currencyRepository
     * @return void
     */
    public function __construct(
        ExchangeRateRepository $exchangeRateRepository,
        CurrencyRepository $currencyRepository
    ) {
        $this->exchangeRateRepository = $exchangeRateRepository;

        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangeRates = $this->exchangeRateRepository->all();

        return response([
            'data' => $exchangeRates,
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
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency'],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.create.before');

        $exchangeRate = $this->exchangeRateRepository->create($request->all());

        Event::dispatch('core.exchange_rate.create.after', $exchangeRate);

        return response([
            'data'    => $exchangeRate,
            'message' => __('admin::app.settings.exchange_rates.create-success'),
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
        $exchangeRate = $this->exchangeRateRepository->findOrFail($id);

        return response([
            'data' => $exchangeRate,
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
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency,' . $id],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.update.before', $id);

        $exchangeRate = $this->exchangeRateRepository->update($request->all(), $id);

        Event::dispatch('core.exchange_rate.update.after', $exchangeRate);

        return response([
            'data'    => $exchangeRate,
            'message' => __('admin::app.settings.exchange_rates.update-success'),
        ]);
    }

    /**
     * Update Rates Using Exchange Rates API
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRates()
    {
        try {
            app(config('services.exchange-api.' . config('services.exchange-api.default') . '.class'))->updateRates();

            return response([
                'message' => __('admin::app.settings.exchange_rates.update-success'),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exchangeRate = $this->exchangeRateRepository->findOrFail($id);

        try {
            Event::dispatch('core.exchange_rate.delete.before', $id);

            $this->exchangeRateRepository->delete($id);

            Event::dispatch('core.exchange_rate.delete.after', $id);

            return response([
                'message' => __('admin::app.settings.exchange_rates.delete-success'),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => __('admin::app.response.delete-error', ['name' => 'Exchange rate']),
        ], 400);
    }
}

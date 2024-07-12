<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\ExchangeRateRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\ExchangeRateResource;

class ExchangeRateController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ExchangeRateRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ExchangeRateResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $validatedData = $request->validate([
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency'],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.create.before');

        $exchangeRate = $this->getRepositoryInstance()->create($validatedData);

        Event::dispatch('core.exchange_rate.create.after', $exchangeRate);

        return response([
            'data'    => new ExchangeRateResource($exchangeRate),
            'message' => trans('rest-api::app.admin.settings.exchange-rates.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): Response
    {
        $validatedData = $request->validate([
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency,' . $id],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.update.before', $id);

        $exchangeRate = $this->getRepositoryInstance()->update($validatedData, $id);

        Event::dispatch('core.exchange_rate.update.after', $exchangeRate);

        return response([
            'data'    => new ExchangeRateResource($exchangeRate),
            'message' => trans('rest-api::app.admin.settings.exchange-rates.update-success'),
        ]);
    }

    /**
     * Update rates using exchange rates API.
     */
    public function updateRates(): Response
    {
        try {
            app(config('services.exchange_api.'.config('services.exchange_api.default').'.class'))->updateRates();

            return response([
                'message' => trans('rest-api::app.admin.settings.tax-rates.update-success'),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $exchangeRate = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('core.exchange_rate.delete.before', $id);

        $exchangeRate->delete();

        Event::dispatch('core.exchange_rate.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.exchange-rates.delete-success'),
        ]);
    }
}

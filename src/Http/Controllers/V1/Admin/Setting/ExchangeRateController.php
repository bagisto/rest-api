<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\ExchangeRateRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\ExchangeRateResource;

class ExchangeRateController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ExchangeRateRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ExchangeRateResource::class;
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

        $exchangeRate = $this->getRepositoryInstance()->create($request->all());

        return response([
            'data'    => new ExchangeRateResource($exchangeRate),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Exchange rate']),
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

        $exchangeRate = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new ExchangeRateResource($exchangeRate),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Exchange rate']),
        ]);
    }

    /**
     * Update rates using exchange rates API.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRates()
    {
        try {
            app(config('services.exchange-api.' . config('services.exchange-api.default') . '.class'))->updateRates();

            return response([
                'message' => __('rest-api::app.common-response.success.update', ['name' => 'Rate']),
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
            ], 500);
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
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Exchange rate']),
        ]);
    }
}

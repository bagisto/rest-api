<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\CurrencyResource;

class CurrencyController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CurrencyRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CurrencyResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'code' => ['required', 'min:3', 'max:3', 'unique:currencies,code', new Code],
            'name' => 'required',
        ]);

        $currency = $this->getRepositoryInstance()->create($request->only([
            'code',
            'name',
            'symbol',
            'decimal',
            'group_separator',
            'decimal_separator',
            'currency_position',
        ]));

        return response([
            'data'    => new CurrencyResource($currency),
            'message' => trans('rest-api::app.admin.settings.currencies.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): Response
    {
        $request->validate([
            'code' => ['required', 'unique:currencies,code,' . $id, new Code],
            'name' => 'required',
        ]);

        $currency = $this->getRepositoryInstance()->update(request()->only([
            'code',
            'name',
            'symbol',
            'decimal',
            'group_separator',
            'decimal_separator',
            'currency_position',
        ]), $id);

        return response([
            'data'    => new CurrencyResource($currency),
            'message' => trans('rest-api::app.admin.settings.currencies.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $currency = $this->getRepositoryInstance()->findOrFail($id);

        if ($currency->count() == 1) {
            return response([
                'message' => trans('rest-api::app.admin.settings.currencies.error.last-item-delete'),
            ], 400);
        }

        $currency->delete();

        return response([
            'message' => trans('rest-api::app.admin.settings.currencies.delete-success'),
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\CurrencyResource;

class CurrencyController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CurrencyRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CurrencyResource::class;
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

        $currency = $this->getRepositoryInstance()->create($request->all());

        Event::dispatch('core.currency.create.after', $currency);

        return response([
            'data'    => new CurrencyResource($currency),
            'message' => __('rest-api::app.response.success.create', ['name' => 'Currency']),
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

        $currency = $this->getRepositoryInstance()->update($request->all(), $id);

        Event::dispatch('core.currency.update.after', $currency);

        return response([
            'data'    => new CurrencyResource($currency),
            'message' => __('rest-api::app.response.success.update', ['name' => 'Currency']),
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
                'message' => __('rest-api::app.response.error.last-item-delete'),
            ], 400);
        }

        Event::dispatch('core.currency.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('core.currency.delete.after', $id);

        return response()->json([
            'message' => __('rest-api::app.response.success.delete', ['name' => 'Currency']),
        ]);
    }

    /**
     * Remove the specified resources from database
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        foreach ($request->indexes as $index) {
            $this->getRepositoryInstance()->findOrFail($index);

            Event::dispatch('core.currency.delete.before', $index);

            $this->getRepositoryInstance()->delete($index);

            Event::dispatch('core.currency.delete.after', $index);
        }

        return response([
            'message' => __('rest-api::app.response.success.mass-operations.delete', ['name' => 'currencies']),
        ]);
    }
}

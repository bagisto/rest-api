<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\SliderResource;

class SliderController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return SliderRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return SliderResource::class;
    }

    /**
     * Creates the new slider item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'string|required',
            'channel_id' => 'required',
            'expired_at' => 'nullable|date',
            'image.*'    => 'required|mimes:bmp,jpeg,jpg,png,webp',
        ]);

        $data = $request->all();

        $data['expired_at'] = $data['expired_at'] ?: null;

        if (isset($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $result = $this->getRepositoryInstance()->save($data);

        if ($result) {
            return response([
                'message' => __('rest-api::app.common-response.success.create', ['name' => 'Slider']),
            ]);
        }

        return response([
            'message' => __('rest-api::app.common-response.error.something-went-wrong'),
        ], 500);
    }

    /**
     * Edit the previously created slider item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'string|required',
            'channel_id' => 'required',
            'expired_at' => 'nullable|date',
            'image.*'    => 'sometimes|mimes:bmp,jpeg,jpg,png,webp',
        ]);

        $data = $request->all();

        $data['expired_at'] = $data['expired_at'] ?: null;

        if (isset($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        if (null === $request->image) {
            return response([
                'message' => __('rest-api::app.common-response.error.something-went-wrong'),
            ], 500);
        }

        $result = $this->getRepositoryInstance()->updateItem($data, $id);

        if ($result) {
            return response([
                'message' => __('rest-api::app.common-response.success.update', ['name' => 'Slider']),
            ]);
        }

        return response([
            'message' => __('rest-api::app.common-response.error.something-went-wrong'),
        ], 500);
    }

    /**
     * Delete the slider item and preserve the last one from deleting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Slider']),
        ]);
    }
}

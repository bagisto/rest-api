<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\SliderRepository;

class SliderController extends SettingController
{
    /**
     * Slider repository instance.
     *
     * @var \Webkul\Core\Repositories\SliderRepository
     */
    protected $sliderRepository;

    /**
     * Channels.
     *
     * @var array
     */
    protected $channels;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @return void
     */
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Loads the index for the sliders settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliderRepository->all();

        return response([
            'data' => $sliders,
        ]);
    }

    /**
     * Creates the new slider item.
     *
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

        $result = $this->sliderRepository->save($data);

        if ($result) {
            return response([
                'data'    => $result,
                'message' => trans('admin::app.settings.sliders.created-success'),
            ]);
        }

        return response([
            'message' => trans('admin::app.settings.sliders.created-fault'),
        ], 400);
    }

    /**
     * Edit the previously created slider item.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->findOrFail($id);

        return response([
            'data' => $slider,
        ]);
    }

    /**
     * Edit the previously created slider item.
     *
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
                'message' => trans('admin::app.settings.sliders.update-fail'),
            ], 400);
        }

        $result = $this->sliderRepository->updateItem($data, $id);

        if ($result) {
            return response([
                'data'    => $result,
                'message' => trans('admin::app.settings.sliders.update-success'),
            ]);
        }

        return response([
            'message' => trans('admin::app.settings.sliders.update-fail'),
        ], 400);
    }

    /**
     * Delete the slider item and preserve the last one from deleting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sliderRepository->findOrFail($id);

        try {
            $this->sliderRepository->delete($id);

            return response([
                'message' => trans('admin::app.response.delete-success', ['name' => 'Slider']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Slider']),
        ], 400);
    }
}

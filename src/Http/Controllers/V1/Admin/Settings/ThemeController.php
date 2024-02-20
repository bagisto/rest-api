<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\ThemeResource;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

class ThemeController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ThemeCustomizationRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ThemeResource::class;
    }

    /**
     * Store a newly created Theme.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (request()->has('id')) {
            $this->validate(request(), [
                core()->getRequestedLocaleCode().'.options.*.image' => 'image|extensions:jpeg,jpg,png,svg,webp',
            ]);

            $theme = $this->getRepositoryInstance()->find(request()->input('id'));

            return $this->getRepositoryInstance()->uploadImage(request()->all(), $theme);
        }

        $data = request()->validate([
            'name'       => 'required',
            'sort_order' => 'required|numeric',
            'type'       => 'required|in:product_carousel,category_carousel,static_content,image_carousel,footer_links,services_content',
            'channel_id' => 'required|in:'.implode(',', core()->getAllChannels()->pluck('id')->toArray()),
        ]);

        Event::dispatch('theme_customization.create.before');

        $theme = $this->getRepositoryInstance()->create($data);

        Event::dispatch('theme_customization.create.after', $theme);

        return response([
            'data'    => $theme,
            'message' => trans('Theme created successfully'),
        ], 201);
    }

    /**
     * Update the Theme
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'name'       => 'required',
            'sort_order' => 'required|numeric',
            'type'       => 'required|in:product_carousel,category_carousel,static_content,image_carousel,footer_links,services_content',
            'channel_id' => 'required|in:'.implode(',', (core()->getAllChannels()->pluck('id')->toArray())),
        ]);

        $locale = request('locale');

        $data = request()->only(
            'locale',
            'type',
            'name',
            'sort_order',
            'channel_id',
            'status',
            $locale
        );

        Event::dispatch('theme_customization.update.before', $id);

        $data['status'] = request()->input('status') == 'on';

        $theme = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('theme_customization.update.after', $theme);

        return response([
            'data'    => $theme,
            'message' => trans('Theme updated successfully'),
        ]);
    }

    /**
     * Destroy the Theme
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::dispatch('theme_customization.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Storage::deleteDirectory('theme/'.$id);

        Event::dispatch('theme_customization.delete.after', $id);

        return response([
            'message' => trans('admin::app.settings.themes.delete-success'),
        ]);
    }
}

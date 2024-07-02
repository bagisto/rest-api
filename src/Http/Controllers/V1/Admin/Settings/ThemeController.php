<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\ThemeResource;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;

class ThemeController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ThemeCustomizationRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ThemeResource::class;
    }

    /**
     * Store a newly created Theme.
     */
    public function store(): Response
    {
        if (request()->has('id')) {
            $this->validate(request(), [
                core()->getRequestedLocaleCode().'.options.*.image' => 'image|extensions:jpeg,jpg,png,svg,webp',
            ]);

            $theme = $this->getRepositoryInstance()->find(request()->input('id'));

            return $this->getRepositoryInstance()->uploadImage(request()->all(), $theme);
        }

        $validated = request()->validate([
            'name'       => 'required',
            'sort_order' => 'required|numeric',
            'type'       => 'required|in:product_carousel,category_carousel,static_content,image_carousel,footer_links,services_content',
            'channel_id' => 'required|in:'.implode(',', core()->getAllChannels()->pluck('id')->toArray()),
            'theme_code' => 'required',
        ]);

        Event::dispatch('theme_customization.create.before');

        $theme = $this->getRepositoryInstance()->create($validated);

        Event::dispatch('theme_customization.create.after', $theme);

        return response([
            'data'    => new ThemeResource($theme),
            'message' => trans('rest-api::app.admin.settings.themes.create-success'),
        ], 201);
    }

    /**
     * Update the Theme.
     */
    public function update(int $id): Response
    {
        $this->validate(request(), [
            'name'       => 'required',
            'sort_order' => 'required|numeric',
            'type'       => 'required|in:product_carousel,category_carousel,static_content,image_carousel,footer_links,services_content',
            'channel_id' => 'required|in:'.implode(',', (core()->getAllChannels()->pluck('id')->toArray())),
            'theme_code' => 'required',
        ]);

        $locale = request('locale');

        $data = request()->only(
            'locale',
            'type',
            'name',
            'sort_order',
            'channel_id',
            'theme_code',
            'status',
            $locale
        );

        Event::dispatch('theme_customization.update.before', $id);

        $data['status'] = request()->input('status') == 'on';

        $theme = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('theme_customization.update.after', $theme);

        return response([
            'data'    => new ThemeResource($theme),
            'message' => trans('rest-api::app.admin.settings.themes.update-success'),
        ]);
    }

    /**
     * Destroy the Theme,
     */
    public function destroy(int $id): Response
    {
        $theme = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('theme_customization.delete.before', $id);

        $theme->delete();

        Storage::deleteDirectory('theme/'.$id);

        Event::dispatch('theme_customization.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.themes.delete-success'),
        ]);
    }
}

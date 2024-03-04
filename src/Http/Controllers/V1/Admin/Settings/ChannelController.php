<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Rules\Code;
use Webkul\RestApi\Http\Resources\V1\Admin\Settings\ChannelResource;

class ChannelController extends SettingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ChannelRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ChannelResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            /* general */
            'code'              => ['required', 'unique:channels,code', new Code],
            'name'              => 'required',
            'description'       => 'nullable',
            'inventory_sources' => 'required|array|min:1',
            'root_category_id'  => 'required',
            'hostname'          => 'unique:channels,hostname',

            /* currencies and locales */
            'locales'           => 'required|array|min:1',
            'default_locale_id' => 'required|in_array:locales.*',
            'currencies'        => 'required|array|min:1',
            'base_currency_id'  => 'required|in_array:currencies.*',

            /* design */
            'theme'             => 'nullable',
            'home_page_content' => 'nullable',
            'footer_content'    => 'nullable',
            'logo.*'            => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
            'favicon.*'         => 'nullable|mimes:bmp,jpeg,jpg,png,webp',

            /* seo */
            'seo_title'       => 'required|string',
            'seo_description' => 'required|string',
            'seo_keywords'    => 'required|string',

            /* maintenance mode */
            'is_maintenance_on'     => 'boolean',
            'maintenance_mode_text' => 'nullable',
            'allowed_ips'           => 'nullable',
        ]);

        $data = $this->setSEOContent($data);

        Event::dispatch('core.channel.create.before');

        $channel = $this->getRepositoryInstance()->create($data);

        Event::dispatch('core.channel.create.after', $channel);

        return response([
            'data'    => new ChannelResource($channel),
            'message' => trans('rest-api::app.admin.settings.channels.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $locale = core()->getRequestedLocaleCode();

        $data = $request->validate([
            /* general */
            'code'                   => ['required', 'unique:channels,code,'.$id, new \Webkul\Core\Rules\Code],
            $locale.'.name'          => 'required',
            $locale.'.description'   => 'nullable',
            'inventory_sources'      => 'required|array|min:1',
            'root_category_id'       => 'required',
            'hostname'               => 'unique:channels,hostname,'.$id,

            /* currencies and locales */
            'locales'           => 'required|array|min:1',
            'default_locale_id' => 'required|in_array:locales.*',
            'currencies'        => 'required|array|min:1',
            'base_currency_id'  => 'required|in_array:currencies.*',

            /* design */
            'theme'                        => 'nullable',
            $locale.'.home_page_content'   => 'nullable',
            $locale.'.footer_content'      => 'nullable',
            'logo.*'                       => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
            'favicon.*'                    => 'nullable|mimes:bmp,jpeg,jpg,png,webp',

            /* seo */
            $locale.'.seo_title'       => 'nullable',
            $locale.'.seo_description' => 'nullable',
            $locale.'.seo_keywords'    => 'nullable',

            /* maintenance mode */
            'is_maintenance_on'                => 'boolean',
            $locale.'.maintenance_mode_text'   => 'nullable',
            'allowed_ips'                      => 'nullable',
        ]);

        $data = $this->setSEOContent($data, $locale);

        Event::dispatch('core.channel.update.before', $id);

        $channel = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('core.channel.update.after', $channel);

        if ($channel->base_currency->code !== session()->get('currency')) {
            session()->put('currency', $channel->base_currency->code);
        }

        return response([
            'data'    => new ChannelResource($channel),
            'message' => trans('rest-api::app.admin.settings.channels.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $channel = $this->getRepositoryInstance()->findOrFail($id);

        if ($channel->code == config('app.channel')) {
            return response([
                'message' => trans('rest-api::app.admin.settings.channels.error.last-item-delete'),
            ], 400);
        }

        Event::dispatch('core.channel.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('core.channel.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.settings.channels.delete-success'),
        ]);
    }

    /**
     * Set the seo content and return back the updated array.
     */
    private function setSEOContent(array $data, string $locale = null): array
    {
        $editedData = $locale ? $data[$locale] : $data;

        $editedData['home_seo'] = [
            'meta_title'       => $editedData['seo_title'],
            'meta_description' => $editedData['seo_description'],
            'meta_keywords'    => $editedData['seo_keywords'],
        ];

        $editedData['home_seo'] = json_encode($editedData['home_seo']);

        unset($editedData['seo_title'], $editedData['seo_description'], $editedData['seo_keywords']);

        if ($locale) {
            $data[$locale] = $editedData;
            $editedData = $data;
        }

        return $editedData;
    }
}

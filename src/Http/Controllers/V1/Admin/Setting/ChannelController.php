<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Setting;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\ChannelResource;

class ChannelController extends SettingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ChannelRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ChannelResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            /* general */
            'code'              => ['required', 'unique:channels,code', new \Webkul\Core\Contracts\Validations\Code],
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

        $channel = $this->getRepositoryInstance()->create($data);

        return response([
            'data'    => new ChannelResource($channel),
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Channel']),
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
        $locale = core()->getRequestedLocaleCode();

        $data = $request->validate([
            /* general */
            'code'                   => ['required', 'unique:channels,code,' . $id, new \Webkul\Core\Contracts\Validations\Code],
            $locale . '.name'        => 'required',
            $locale . '.description' => 'nullable',
            'inventory_sources'      => 'required|array|min:1',
            'root_category_id'       => 'required',
            'hostname'               => 'unique:channels,hostname,' . $id,

            /* currencies and locales */
            'locales'           => 'required|array|min:1',
            'default_locale_id' => 'required|in_array:locales.*',
            'currencies'        => 'required|array|min:1',
            'base_currency_id'  => 'required|in_array:currencies.*',

            /* design */
            'theme'                        => 'nullable',
            $locale . '.home_page_content' => 'nullable',
            $locale . '.footer_content'    => 'nullable',
            'logo.*'                       => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
            'favicon.*'                    => 'nullable|mimes:bmp,jpeg,jpg,png,webp',

            /* seo */
            $locale . '.seo_title'       => 'nullable',
            $locale . '.seo_description' => 'nullable',
            $locale . '.seo_keywords'    => 'nullable',

            /* maintenance mode */
            'is_maintenance_on'                => 'boolean',
            $locale . '.maintenance_mode_text' => 'nullable',
            'allowed_ips'                      => 'nullable',
        ]);

        $data = $this->setSEOContent($data, $locale);

        $channel = $this->getRepositoryInstance()->update($data, $id);

        if ($channel->base_currency->code !== session()->get('currency')) {
            session()->put('currency', $channel->base_currency->code);
        }

        return response([
            'data'    => new ChannelResource($channel),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Channel']),
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
        $channel = $this->getRepositoryInstance()->findOrFail($id);

        if ($channel->code == config('app.channel')) {
            return response([
                'message' => __('rest-api::app.common-response.error.last-item-delete', ['name' => 'channel']),
            ], 400);
        }

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Channel']),
        ]);
    }

    /**
     * Set the seo content and return back the updated array.
     *
     * @param  array  $data
     * @param  string  $locale
     * @return array
     */
    private function setSEOContent(array $data, $locale = null)
    {
        $editedData = $data;

        if ($locale) {
            $editedData = $data[$locale];
        }

        $editedData['home_seo']['meta_title'] = $editedData['seo_title'];
        $editedData['home_seo']['meta_description'] = $editedData['seo_description'];
        $editedData['home_seo']['meta_keywords'] = $editedData['seo_keywords'];
        $editedData['home_seo'] = json_encode($editedData['home_seo']);

        $editedData = $this->unsetKeys($editedData, ['seo_title', 'seo_description', 'seo_keywords']);

        if ($locale) {
            $data[$locale] = $editedData;
            $editedData = $data;
        }

        return $editedData;
    }

    /**
     * Unset keys.
     *
     * @param  array  $keys
     * @return array
     */
    private function unsetKeys($data, $keys)
    {
        foreach ($keys as $key) {
            unset($data[$key]);
        }

        return $data;
    }
}

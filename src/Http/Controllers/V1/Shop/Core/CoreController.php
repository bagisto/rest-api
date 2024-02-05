<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\RestApi\Http\Controllers\V1\Shop\ShopController;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\ConfigurationResource;

class CoreController extends ShopController
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return false;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CoreConfigRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ConfigurationResource::class;
    }

    /**
     * Get core configs.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCoreConfigs(Request $request)
    {
        $this->validate($request, [
            '_config'   => 'required|array',
            '_config.*' => 'required|string',
        ]);

        $configValues = [];

        foreach ($request->input('_config') as $config) {
            $configValues[$config] = core()->getConfigData($config);
        }

        return response(['data' => $configValues]);
    }
}

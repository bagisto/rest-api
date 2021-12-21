<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Controllers\V1\Shop\ResourceController;

class CoreController extends ResourceController
{
    /**
     * Get core configs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCoreConfigs(Request $request)
    {
        $configValues = [];

        foreach (explode(',', $request->input('_config')) as $config) {
            $configValues[$config] = core()->getConfigData($config);
        }

        return response(['data' => $configValues]);
    }
}

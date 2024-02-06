<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Shop\Repositories\ThemeCustomizationRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\ThemeResource;

class ThemeController extends CoreController
{
    /**
     * Using const variable for status
     */
    public const STATUS = 1;

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository(){
        return ThemeCustomizationRepository::class;
    }

    public function resource()
    {
        return ThemeResource::class;
    }

    public function getThemeCustomizations(){
        $customizations = $this->getRepositoryInstance()->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id
        ]);

        return response([
            'data'    => $customizations,
        ]);
    }
}

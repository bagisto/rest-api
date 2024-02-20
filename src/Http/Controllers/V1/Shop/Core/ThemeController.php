<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\RestApi\Http\Resources\V1\Shop\Core\ThemeResource;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

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
     * Get Theme Customizations listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThemeCustomizations()
    {
        $customizations = $this->getRepositoryInstance()->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id,
        ]);

        return response([
            'data'    => $customizations,
        ]);
    }
}

<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\RestApi\Http\Resources\V1\Shop\Core\ThemeResource;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;

class ThemeController extends CoreController
{
    /**
     * Using const variable for status
     */
    public const STATUS = 1;

    /**
     * Repository class name.
     */
    public function repository():string
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
     * Get Theme Customizations listing.
     */
    public function getThemeCustomizations(): \Illuminate\Http\Response
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

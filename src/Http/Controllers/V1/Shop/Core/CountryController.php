<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\CountryRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\CountryResource;

class CountryController extends CoreController
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
        return CountryRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CountryResource::class;
    }

    /**
     * Get country state group listing.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCountryStateGroups(Request $request)
    {
        $resources = core()->groupedStatesByCountries();

        return response(['data' => $resources]);
    }
}

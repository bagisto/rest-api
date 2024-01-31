<?php

namespace Webkul\RestApi\Contracts;

interface ResourceContract
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized();

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository();

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource();
}

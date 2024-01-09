<?php

namespace Webkul\RestApi\Traits;

trait ProvideResource
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return true;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return '';
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return '';
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function lessProductResource()
    {
        return '';
    }

    /**
     * Get repository instance.
     *
     * @return object
     */
    public function getRepositoryInstance()
    {
        return app($this->repository());
    }

    /**
     * Get resource collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getResourceCollection($results)
    {
        return ($this->resource())::collection($results);
    }

    /**
     * Get resource simple collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSimpleResourceCollection($results)
    {
        return ($this->lessProductResource())::collection($results);
    }
}

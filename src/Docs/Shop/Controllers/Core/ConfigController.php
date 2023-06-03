<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Core;

class ConfigController
{
    /**
     * @OA\Get(
     *      path="/api/v1/core-configs",
     *      operationId="getCoreConfig",
     *      tags={"Configs"},
     *      summary="Get Core Config Value",
     *      description="Get core config field value by id",
     *      @OA\Parameter(
     *          name="_config",
     *          description="Config id",
     *          required=true,
     *          example="general.general.locale_options.weight_unit,general.content.shop.compare_option",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ConfigValue"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function getCoreConfigs()
    {
    }

	/**
	 * @OA\Get(
	 *      path="/api/v1/core-config-fields",
	 *      operationId="getCoreConfigList",
	 *      tags={"Configs"},
	 *      summary="Get config records list",
     *      description="Returns config list, if you want to retrieve all config records at once pass pagination=0 otherwise ignore this parameter",
     *      @OA\Parameter(
     *          name="id",
     *          description="Config Record id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Config")
     *              ),
     *              @OA\Property(
     *                  property="meta",
     *                  ref="#/components/schemas/Pagination"
     *              )
     *          )
     *      )
	 * )
	 */
	public function list()
	{
	}

    /**
     * @OA\Get(
	 *      path="/api/v1/core-config-fields/{id}",
	 *      operationId="getCoreConfigDetail",
     *      tags={"Configs"},
     *      summary="Get config's record by id",
     *      description="Returns config's record by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Config id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Config"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function get()
    {
    }
}
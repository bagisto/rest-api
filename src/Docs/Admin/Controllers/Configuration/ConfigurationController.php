<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Configuration;

class ConfigurationController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/configuration",
	 *      operationId="getConfigurations",
	 *      tags={"Configurations"},
	 *      summary="Get admin configuration's item list",
     *      description="Returns configuration's item list",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Configuration")
     *              )
     *          )
     *      )
	 * )
	 */
	public function list()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/configuration",
     *      operationId="storeConfiguration",
     *      tags={"Configurations"},
     *      summary="Store the configuration value",
     *      description="Store the configuration calue",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="channel",
     *                      description="Channel code for which you want to save the config value",
     *                      type="string",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      description="Locale code for which you want to save the config value",
     *                      type="string",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="index",
     *                      description="Replace `index` with your key, like: `general`",
     *                      type="object",
     *                      example={
     *                          "general": {
     *                              "content": {
     *                                  "shop": {
     *                                      "compare_option": "0",
     *                                      "wishlist_option": "0"
     *                                   },
     *                                  "footer": {
     *                                    "footer_content": "Powered By Webkul",
     *                                    "footer_toggle": "1"
     *                                  },
     *                                  "custom_scripts": {
     *                                    "custom_css": "<style>.demo{width:100px;}</style>",
     *                                    "custom_javascript": "<script>console.log('Texting')</script>"
     *                                  }
     *                              }
     *                          }
     *                      },
     *                      @OA\Property(
     *                          property="child_index",
     *                          description="Replace `child_index` with your key, like: `content`",
     *                          type="object",
     *                          @OA\Property(
     *                              property="child_1_sub_index",
     *                              type="object",
     *                              description="Replace `child_1_sub_index` with your key, like: `shop`",
     *                              @OA\Property(property="child_1_sub_index_1", type="string", example="1"),
     *                              @OA\Property(property="child_1_sub_index_2", type="string", example="1")
     *                          ),
     *                          @OA\Property(
     *                              property="child_2_sub_index",
     *                              type="object",
     *                              description="Replace `child_2_sub_index` with your key, like: `shop`",
     *                              @OA\Property(property="child_2_sub_index_1", type="string", example="1")
     *                          ),
     *                          @OA\Property(
     *                              property="child_3_sub_index",
     *                              type="object",
     *                              description="Replace `child_3_sub_index` with your key, like: `shop`",
     *                              @OA\Property(property="child_3_sub_index_1", type="string", example="1"),
     *                              @OA\Property(property="child_3_sub_index_2", type="string", example="1")
     *                          )
     *                      )
     *                  ),
     *                  required={"channel", "locale"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Configuration updated successfully.")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function store()
    {
    }
}

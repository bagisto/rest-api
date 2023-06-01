<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Catalog;

class AttributeController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/catalog/attributes",
	 *      operationId="getAdminAttributes",
	 *      tags={"Attributes"},
	 *      summary="Get attribute list for the shop",
     *      description="Returns attribute list, if you want to retrieve all attributes at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute id",
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
     *                  @OA\Items(ref="#/components/schemas/Attribute")
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
	 *      path="/api/v1/admin/catalog/attributes/{id}",
	 *      operationId="getAttribute",
	 *      tags={"Attributes"},
	 *      summary="Get admin attribute detail",
     *      description="Returns attribute detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute ID",
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
     *                  ref="#/components/schemas/Attribute"
     *              )
     *          )
     *      )
	 * )
	 */
	public function get()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/catalog/attributes",
     *      operationId="storeAttribute",
     *      tags={"Attributes"},
     *      summary="Store the attribute",
     *      description="Store the attribute",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      description="Attribute's code",
     *                      example="age_range"
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      type="string",
     *                      description="Attribute's type",
     *                      example="select",
     *                      enum={"text", "textarea", "price", "boolean", "select", "multiselect", "datetime", "date", "image", "file", "checkbox"}
     *                  ),
     *                  @OA\Property(
     *                      property="admin_name",
     *                      type="string",
     *                      description="Attribute's admin name",
     *                      example="Age Range"
     *                  ),
     *                  @OA\Property(
     *                      property="en",
     *                      description="Attribute's name based on locale English",
     *                      type="object",
     *                      @OA\Property(property="name", type="string", example="Age Range")
     *                  ),
     *                  @OA\Property(
     *                      property="fr",
     *                      description="Attribute's name based on locale French",
     *                      type="object",
     *                      @OA\Property(property="name", type="string", example="Tranche d'âge")
     *                  ),
     *                  @OA\Property(
     *                      property="swatch_type",
     *                      description="Only use with select type attribute",
     *                      type="string",
     *                      example="dropdown",
     *                      enum={"dropdown", "color", "image", "text"}
     *                  ),
     *                  @OA\Property(
     *                      property="default-null-option",
     *                      description="Only use with select type attribute, i.e. `on` or `null`",
     *                      type="string",
     *                      example=null,
     *                      enum={"on"}
     *                  ),
     *                  @OA\Property(
     *                      property="options",
     *                      description="Only use with select type attribute, i.e. `on` or `null`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="option_1",
     *                          type="object",
     *                          @OA\Property(property="swatch_value", description="Only use with `swatch_type` = `color` & `image`", type="string", example="#00ff00"),
     *                          @OA\Property(property="sort_order", type="integer", example=1),
     *                          @OA\Property(property="admin_name", type="string", example="10 & Above"),
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="10 & Above"),
     *                          ),
     *                          @OA\Property(
     *                              property="fr",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="10 et plus"),
     *                          ),
     *                          @OA\Property(
     *                              property="nl",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="10  en hoger"),
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="option_2",
     *                          type="object",
     *                          @OA\Property(property="swatch_value", description="Only use with `swatch_type` = `color` & `image`", type="string", example="#b6d7a8"),
     *                          @OA\Property(property="sort_order", type="integer", example=2),
     *                          @OA\Property(property="admin_name", type="string", example="20 & Above"),
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="20 & Above"),
     *                          ),
     *                          @OA\Property(
     *                              property="fr",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="20 et plus"),
     *                          ),
     *                          @OA\Property(
     *                              property="nl",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="20 en hoger"),
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="is_required",
     *                      description="Attribute is required or not",
     *                      type="integer",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_unique",
     *                      description="Attribute is unique or not",
     *                      type="integer",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="validation",
     *                      description="Attribute's validation",
     *                      type="string",
     *                      example="numeric",
     *                      enum={"numeric", "email", "decimal", "url"}
     *                  ),
     *                  @OA\Property(
     *                      property="value_per_locale",
     *                      description="Attribute's value per locale",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="value_per_channel",
     *                      description="Attribute's value per channel",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_configurable",
     *                      description="Attribute can in configurable product",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_visible_on_front",
     *                      description="Attribute's value can show on front",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="use_in_flat",
     *                      description="Attribute's value will store in flat table",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_comparable",
     *                      description="Attribute's value will use in comparable option",
     *                      type="boolean",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  required={"code", "admin_name"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Attribute created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Attribute")
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

    /**
     * @OA\Put(
     *      path="/api/v1/admin/catalog/attributes/{id}",
     *      operationId="updateAttribute",
     *      tags={"Attributes"},
     *      summary="Update attribute",
     *      description="Update attribute",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      description="Attribute's code",
     *                      example="age_range"
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      type="string",
     *                      description="Attribute's type",
     *                      example="select",
     *                      enum={"text", "textarea", "price", "boolean", "select", "multiselect", "datetime", "date", "image", "file", "checkbox"}
     *                  ),
     *                  @OA\Property(
     *                      property="admin_name",
     *                      type="string",
     *                      description="Attribute's admin name",
     *                      example="Age Range"
     *                  ),
     *                  @OA\Property(
     *                      property="en",
     *                      description="Attribute's name based on locale English",
     *                      type="object",
     *                      @OA\Property(property="name", type="string", example="Age Range")
     *                  ),
     *                  @OA\Property(
     *                      property="fr",
     *                      description="Attribute's name based on locale French",
     *                      type="object",
     *                      @OA\Property(property="name", type="string", example="Tranche d'âge")
     *                  ),
     *                  @OA\Property(
     *                      property="swatch_type",
     *                      description="Only use with select type attribute",
     *                      type="string",
     *                      example="dropdown",
     *                      enum={"dropdown", "color", "image", "text"}
     *                  ),
     *                  @OA\Property(
     *                      property="default-null-option",
     *                      description="Only use with select type attribute, i.e. `on` or `null`",
     *                      type="string",
     *                      example=null,
     *                      enum={"on"}
     *                  ),
     *                  @OA\Property(
     *                      property="options",
     *                      description="Only use with select type attribute, i.e. `on` or `null`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="28",
     *                          type="object",
     *                          @OA\Property(property="swatch_value", description="Only use with `swatch_type` = `color` & `image`", type="string", example="#00ff00"),
     *                          @OA\Property(property="isNew", type="boolean", example=false, enum={true, false}),
     *                          @OA\Property(property="isDelete", type="boolean", example=false, enum={true, false}),
     *                          @OA\Property(property="sort_order", type="integer", example=1),
     *                          @OA\Property(property="admin_name", type="string", example="10 & Above"),
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="10 & Above"),
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="29",
     *                          type="object",
     *                          @OA\Property(property="swatch_value", description="Only use with `swatch_type` = `color` & `image`", type="string", example="#b6d7a8"),
     *                          @OA\Property(property="isNew", type="boolean", example=false, enum={true, false}),
     *                          @OA\Property(property="isDelete", type="boolean", example=true, enum={true, false}),
     *                          @OA\Property(property="sort_order", type="integer", example=2),
     *                          @OA\Property(property="admin_name", type="string", example="20 & Above"),
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="20 & Above"),
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="option_3",
     *                          type="object",
     *                          @OA\Property(property="swatch_value", description="Only use with `swatch_type` = `color` & `image`", type="string", example="#b6d7a8"),
     *                          @OA\Property(property="isNew", type="boolean", example=true, enum={true, false}),
     *                          @OA\Property(property="isDelete", type="boolean", example=false, enum={true, false}),
     *                          @OA\Property(property="sort_order", type="integer", example=3),
     *                          @OA\Property(property="admin_name", type="string", example="30 & Above"),
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="30 & Above"),
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="is_required",
     *                      description="Attribute is required or not",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_unique",
     *                      description="Attribute is unique or not",
     *                      type="integer",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="validation",
     *                      description="Attribute's validation",
     *                      type="string",
     *                      example="numeric",
     *                      enum={"numeric", "email", "decimal", "url"}
     *                  ),
     *                  @OA\Property(
     *                      property="is_configurable",
     *                      description="Attribute can in configurable product",
     *                      type="boolean",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_visible_on_front",
     *                      description="Attribute's value can show on front",
     *                      type="boolean",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="use_in_flat",
     *                      description="Attribute's value will store in flat table",
     *                      type="boolean",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_comparable",
     *                      description="Attribute's value will use in comparable option",
     *                      type="boolean",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  required={"code", "admin_name"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Attribute updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Attribute"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/catalog/attributes/{id}",
     *      operationId="deleteAttribute",
     *      tags={"Attributes"},
     *      summary="Delete attribute by id",
     *      description="Delete attribute by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute ID",
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
     *                  property="message",
     *                  type="string",
     *                  example="Attribute deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/catalog/attributes/mass-destroy",
     *      operationId="massDeleteAttributes",
     *      tags={"Attributes"},
     *      summary="Mass delete attributes",
     *      description="Mass delete attributes",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="Attribute's Ids `CommaSeperated`",
     *                      type="string",
     *                      example="1,2"
     *                  ),
     *                  required={"indexes"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Selected attributes successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

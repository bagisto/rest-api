<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Catalog;

class AttributeFamilyController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/catalog/attribute-families",
	 *      operationId="getAdminAttributeFamilies",
	 *      tags={"Attribute-Families"},
	 *      summary="Get attribute family list for the shop",
     *      description="Returns attribute family list, if you want to retrieve all attribute families at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute Family id",
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
     *                  @OA\Items(ref="#/components/schemas/AttributeFamily")
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
	 *      path="/api/v1/admin/catalog/attribute-families/{id}",
	 *      operationId="getAttributeFamily",
	 *      tags={"Attribute-Families"},
	 *      summary="Get admin attribute family detail",
     *      description="Returns attribute family detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute Family ID",
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
     *                  ref="#/components/schemas/AttributeFamily"
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
     *      path="/api/v1/admin/catalog/attribute-families",
     *      operationId="storeAttributeFamily",
     *      tags={"Attribute-Families"},
     *      summary="Store the attribute",
     *      description="Store the attribute family",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="code",
     *                      description="Attribute family's code",
     *                      type="string",
     *                      example="furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      description="Attribute family's name",
     *                      type="string",
     *                      example="Furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="attribute_groups",
     *                      description="Attribute family's attribute groups",
     *                      type="object",
     *                      @OA\Property(
     *                          property="group_0",
     *                          type="object",
     *                          @OA\Property(property="name", type="string", example="General"),
     *                          @OA\Property(property="position", type="integer", example=1),
     *                          @OA\Property(property="is_user_defined", type="integer", example=0),
     *                          @OA\Property(
     *                              property="custom_attributes",
     *                              type="array",
     *                              @OA\Items(@OA\Property(property="id", type="integer", example=1))
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="group_1",
     *                          type="object",
     *                          @OA\Property(property="name", type="string", example="Description"),
     *                          @OA\Property(property="position", type="integer", example=2),
     *                          @OA\Property(property="is_user_defined", type="integer", example=0),
     *                          @OA\Property(
     *                              property="custom_attributes",
     *                              type="array",
     *                              @OA\Items(@OA\Property(property="id", type="integer", example=9))
     *                          )
     *                      )
     *                  ),
     *                  required={"code", "name", "attribute_groups"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Family created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/AttributeFamily")
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
     *      path="/api/v1/admin/catalog/attribute-families/{id}",
     *      operationId="updateAttributeFamily",
     *      tags={"Attribute-Families"},
     *      summary="Update attribute family",
     *      description="Update attribute family",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute Family ID",
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
     *                      description="Attribute family's code",
     *                      type="string",
     *                      example="furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      description="Attribute family's name",
     *                      type="string",
     *                      example="Furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="attribute_groups",
     *                      description="Attribute family's attribute groups",
     *                      type="object",
     *                      @OA\Property(
     *                          property="6",
     *                          type="object",
     *                          @OA\Property(property="name", type="string", example="General"),
     *                          @OA\Property(property="position", type="integer", example=1),
     *                          @OA\Property(property="is_user_defined", type="integer", example=0),
     *                          @OA\Property(
     *                              property="custom_attributes",
     *                              type="array",
     *                              @OA\Items(@OA\Property(property="id", type="integer", example=1))
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="7",
     *                          type="object",
     *                          @OA\Property(property="name", type="string", example="Description"),
     *                          @OA\Property(property="position", type="integer", example=2),
     *                          @OA\Property(property="is_user_defined", type="integer", example=0),
     *                          @OA\Property(
     *                              property="custom_attributes",
     *                              type="array",
     *                              @OA\Items(@OA\Property(property="id", type="integer", example=9))
     *                          )
     *                      )
     *                  ),
     *                  required={"code", "name", "attribute_groups"}
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
     *                  example="Family updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/AttributeFamily"
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
     *      path="/api/v1/admin/catalog/attribute-families/{id}",
     *      operationId="deleteAttributeFamily",
     *      tags={"Attribute-Families"},
     *      summary="Delete attribute family by id",
     *      description="Delete attribute family by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Attribute Family ID",
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
     *                  example="Family deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

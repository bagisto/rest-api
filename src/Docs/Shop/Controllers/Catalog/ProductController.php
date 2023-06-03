<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Catalog;

class ProductController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/products",
	 *      operationId="getShopProducts",
	 *      tags={"Products"},
	 *      summary="Get product list for the shop",
     *      description="Returns product list, if you want to retrieve all products at once pass pagination=0 otherwise ignore this parameter",
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sku",
     *          description="Product SKU",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
     *                  @OA\Items(ref="#/components/schemas/Product")
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
	 *      path="/api/v1/products/{id}",
	 *      operationId="getShopProduct",
     *      tags={"Products"},
     *      summary="Get shop product by id",
     *      description="Returns shop product by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *                  ref="#/components/schemas/Product"
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

    /**
     * @OA\Get(
	 *      path="/api/v1/products/{id}/additional-information",
	 *      operationId="getShopProductAdditionalInfo",
     *      tags={"Products"},
     *      summary="Get product's additional info by id",
     *      description="Get product's additional info by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *                  type="array",
     *                  example={{
     *                      "id": 25,
     *                      "code": "brand",
     *                      "label": "Brand",
     *                      "value": "Puma",
     *                      "admin_name": "Brand",
     *                      "type": "select"
     *                  },  {
     *                      "id": 26,
     *                      "code": "occasion",
     *                      "label": "Occasion",
     *                      "value": "Anniversary, Wedding",
     *                      "admin_name": "Occasion",
     *                      "type": "multiselect"
     *                  }},
     *                  @OA\Items(
     *                       @OA\Property(property="id", type="integer"),
     *                       @OA\Property(property="code", type="string"),
     *                       @OA\Property(property="label", type="string"),
     *                       @OA\Property(property="value", type="string"),
     *                       @OA\Property(property="admin_name", type="string"),
     *                       @OA\Property(property="type", type="string", example="select", enum={"text", "textarea", "price", "boolean", "select", "multiselect", "datetime", "date", "image", "file", "checkbox"})
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function additionalInformation()
    {
    }

    /**
     * @OA\Get(
	 *      path="/api/v1/products/{id}/configurable-config",
	 *      operationId="getShopProductConfigurableOptions",
     *      tags={"Products"},
     *      summary="Get configurable product options by id",
     *      description="Returns configurable product options by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *                  ref="#/components/schemas/ProductConfigurableConfig"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function configurableConfig()
    {
    }

    /**
     * @OA\Get(
	 *      path="/api/v1/products/{product_id}/is-wishlisted",
	 *      operationId="getShopProductIsWishlistStatus",
     *      tags={"Products"},
     *      summary="Get product's wishlist status",
     *      description="Get product's wishlist status",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="product_id",
     *          description="Product id",
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
     *                  @OA\Property(property="is_wishlisted", type="boolean", example="false", enum={"true", "false"})
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function isWishlisted()
    {
    }

    /**
     * @OA\Post(
	 *      path="/api/v1/products/{product_id}/reviews",
	 *      operationId="storeProductReview",
     *      tags={"Products"},
     *      summary="Store product's review by login customer",
     *      description="Store product's review by login customer",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="product_id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
	 *      @OA\RequestBody(
	 *          @OA\MediaType(
	 *              mediaType="multipart/form-data",
	 *              @OA\Schema(
	 *                  @OA\Property(
	 *                      property="title",
	 *                      type="string"
	 *                  ),
	 *                  @OA\Property(
	 *                      property="comment",
	 *                      type="string"
	 *                  ),
	 *                  @OA\Property(
	 *                      property="rating",
	 *                      type="integer",
	 *                      format="int64",
	 *                      example=4,
     *                      enum={"5", "4", "3", "2", "1"}
	 *                  ),
	 *                  required={"comment", "rating", "title"}
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
     *                  example="Your review submitted successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ProductReview"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function store()
    {
    }
}
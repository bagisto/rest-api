<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Catalog;

class ProductController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/catalog/products",
	 *      operationId="getProducts",
	 *      tags={"Products"},
	 *      summary="Get admin catalog product list",
     *      description="Returns catalog product list, if you want to retrieve all catalog products at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product Id",
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
     *                  @OA\Items(
     *                      allOf={
     *                          @OA\Schema(ref="#/components/schemas/Product"),
     *                          @OA\Schema(ref="#/components/schemas/ProductFlat")
     *                      }
     *                  )
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
	 *      path="/api/v1/admin/catalog/products/{id}",
	 *      operationId="getProduct",
	 *      tags={"Products"},
	 *      summary="Get admin catalog product detail",
     *      description="Returns catalog product detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
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
     *                  allOf={
     *                      @OA\Schema(ref="#/components/schemas/Product"),
     *                      @OA\Schema(ref="#/components/schemas/ProductFlat")
     *                  }
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
     *      path="/api/v1/admin/catalog/products",
     *      operationId="storeProduct",
     *      tags={"Products"},
     *      summary="Store the catalog product",
     *      description="Store the catalog product",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="type",
     *                      description="Product's type i.e. `simple`, `configurable`, `virtual`, `grouped`, `downloadable`, `bundle`, `booking`",
     *                      type="string",
     *                      example="simple",
     *                      enum={"simple", "configurable", "virtual", "grouped", "downloadable", "bundle", "booking"}
     *                  ),
     *                  @OA\Property(
     *                      property="attribute_family_id",
     *                      description="Attribute Family ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="sku",
     *                      description="Product's SKU Must be unique",
     *                      type="string",
     *                      example="furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="super_attributes",
     *                      description="Product's super attributes `Only use with configurable type product`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="color",
     *                          type="array",
     *                          @OA\Items(type="integer", example=1)
     *                      ),
     *                      @OA\Property(
     *                          property="size",
     *                          type="array",
     *                          @OA\Items(type="integer", example=6)
     *                      )
     *                  ),
     *                  required={"type", "attribute_family_id", "sku"}
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
     *                  example="Product created successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  allOf={
     *                      @OA\Schema(ref="#/components/schemas/Product"),
     *                      @OA\Schema(ref="#/components/schemas/ProductFlat")
     *                  }
     *              )
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
     * @OA\Post(
     *      path="/api/v1/admin/catalog/products/{id}",
     *      operationId="updateProduct",
     *      tags={"Products"},
     *      summary="Update product (Simple, Virtual)",
     *      description="Update product (Simple, Virtual)",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
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
     *                      property="_method",
     *                      type="string",
     *                      example="PUT"
     *                  ),
     *                  @OA\Property(
     *                      property="channel",
     *                      description="Store's channel code",
     *                      type="string",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      description="Store's locale code",
     *                      type="string",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="sku",
     *                      description="Product's SKU must be unique",
     *                      type="string",
     *                      example="furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="product_number",
     *                      description="Product's number",
     *                      type="string",
     *                      example="ssf-001"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      description="Product's name",
     *                      type="string",
     *                      example="Sofa Set"
     *                  ),
     *                  @OA\Property(
     *                      property="url_key",
     *                      description="Product's url key",
     *                      type="string",
     *                      example="sofa-set-furniture"
     *                  ),
     *                  @OA\Property(
     *                      property="tax_category_id",
     *                      description="Product's tax category id",
     *                      format="id",
     *                      type="integer",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="new",
     *                      description="New's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="featured",
     *                      description="Featured's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="visible_individually",
     *                      description="Product visible individually status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="guest_checkout",
     *                      description="Product guest checkout status",
     *                      type="integer",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      description="Product status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="color",
     *                      description="Product's color attribute",
     *                      format="id",
     *                      type="integer",
     *                      example=3
     *                  ),
     *                  @OA\Property(
     *                      property="size",
     *                      description="Product's size attribute",
     *                      format="id",
     *                      type="integer",
     *                      example=9
     *                  ),
     *                  @OA\Property(
     *                      property="brand",
     *                      description="Product's brand attribute",
     *                      format="id",
     *                      type="integer",
     *                      example=17
     *                  ),
     *                  @OA\Property(
     *                      property="short_description",
     *                      description="Product's short description",
     *                      type="string",
     *                      example="What is Lorem Ipsum?"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="Product's description",
     *                      type="string",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="meta_title",
     *                      description="Product's meta title",
     *                      type="string",
     *                      example="Premium sofa sets"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_description",
     *                      description="Product's meta description",
     *                      type="string",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="meta_keywords",
     *                      description="Product's meta keywords",
     *                      type="string",
     *                      example="Sofa set"
     *                  ),
     *                  @OA\Property(
     *                      property="price",
     *                      description="Product's price",
     *                      type="float",
     *                      example=10.50
     *                  ),
     *                  @OA\Property(
     *                      property="cost",
     *                      description="Product's cost",
     *                      type="float",
     *                      example=0.00
     *                  ),
     *                  @OA\Property(
     *                      property="special_price",
     *                      description="Product's special price",
     *                      type="float",
     *                      example=8.30
     *                  ),
     *                  @OA\Property(
     *                      property="special_price_from",
     *                      description="Product's special price from",
     *                      type="date",
     *                      example="2023-05-30"
     *                  ),
     *                  @OA\Property(
     *                      property="special_price_to",
     *                      description="Product's special price to",
     *                      type="date",
     *                      example="2025-05-22"
     *                  ),
     *                  @OA\Property(
     *                      property="length",
     *                      description="Product's length, `Info: not use in virtual, downloadable types product`",
     *                      type="float"
     *                  ),
     *                  @OA\Property(
     *                      property="width",
     *                      description="Product's width, `Info: not use in virtual, downloadable types product`",
     *                      type="float"
     *                  ),
     *                  @OA\Property(
     *                      property="height",
     *                      description="Product's height, `Info: not use in virtual, downloadable types product`",
     *                      type="float"
     *                  ),
     *                  @OA\Property(
     *                      property="weight",
     *                      description="Product's weight, `Info: not use in virtual, downloadable types product`",
     *                      type="float",
     *                      example=1.00
     *                  ),
     *                  @OA\Property(
     *                      property="inventories[1]",
     *                      description="Product's inventories",
     *                      type="array",
     *                      @OA\Items(type="integer", example=500)
     *                  ),
     *                  @OA\Property(
     *                      property="images[files][]",
     *                      description="Product's images",
     *                      type="array",
     *                      @OA\Items(format="binary", type="string")
     *                  ),
     *                  @OA\Property(
     *                      property="images[position][]",
     *                      description="Product's image position",
     *                      type="array",
     *                      collectionFormat="multi",
     *                      @OA\Items(format="id", type="inetger", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="videos[files][]",
     *                      description="Product's videos",
     *                      type="array",
     *                      @OA\Items(format="binary", type="string")
     *                  ),
     *                  @OA\Property(
     *                      property="videos[position][]",
     *                      description="Product's video position",
     *                      type="array",
     *                      collectionFormat="multi",
     *                      @OA\Items(format="id", type="inetger", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="categories[]",
     *                      description="Product's categories",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="channels[]",
     *                      description="Product's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="up_sell[]",
     *                      description="Product's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="cross_sell[]",
     *                      description="Product's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=18)
     *                  ),
     *                  @OA\Property(
     *                      property="related_products[]",
     *                      description="Product's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=8)
     *                  ),
     *                  required={"sku", "name", "url_key", "short_description", "description"}
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
     *                  example="Product updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Product"
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
     * @OA\Put(
     *      path="/api/v1/admin/catalog/products/{id}",
     *      operationId="updateOtherTypeProduct",
     *      tags={"Products"},
     *      summary="Update product (Configurable, Grouped, Downloadable, Bundle, Booking)",
     *      description="Update product (Configurable, Grouped, Downloadable, Bundle, Booking)",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
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
     *                      property="channel",
     *                      description="Store's channel code",
     *                      type="string",
     *                      example="default"
     *                  ),
     *                  @OA\Property(
     *                      property="locale",
     *                      description="Store's locale code",
     *                      type="string",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="sku",
     *                      description="Product's SKU must be unique",
     *                      type="string",
     *                      example="skipping-rope"
     *                  ),
     *                  @OA\Property(
     *                      property="product_number",
     *                      description="Product's number",
     *                      type="string",
     *                      example="sr-001"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      description="Product's name",
     *                      type="string",
     *                      example="Skipping Rope"
     *                  ),
     *                  @OA\Property(
     *                      property="url_key",
     *                      description="Product's url key",
     *                      type="string",
     *                      example="skipping-rope"
     *                  ),
     *                  @OA\Property(
     *                      property="tax_category_id",
     *                      description="Product's tax category id",
     *                      format="id",
     *                      type="integer",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="new",
     *                      description="New's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="featured",
     *                      description="Featured's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="visible_individually",
     *                      description="Product visible individually status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="guest_checkout",
     *                      description="Product guest checkout status",
     *                      type="integer",
     *                      example=0,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      description="Product status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="brand",
     *                      description="Product's brand attribute",
     *                      format="id",
     *                      type="integer",
     *                      example=17
     *                  ),
     *                  @OA\Property(
     *                      property="short_description",
     *                      description="Product's short description",
     *                      type="string",
     *                      example="What is Lorem Ipsum?"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="Product's description",
     *                      type="string",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="meta_title",
     *                      description="Product's meta title",
     *                      type="string",
     *                      example="Premium sofa sets"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_description",
     *                      description="Product's meta description",
     *                      type="string",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="meta_keywords",
     *                      description="Product's meta keywords",
     *                      type="string",
     *                      example="Sofa set"
     *                  ),
     *                  @OA\Property(
     *                      property="price",
     *                      description="Product's price",
     *                      type="float",
     *                      example=0.00
     *                  ),
     *                  @OA\Property(
     *                      property="customer_group_prices",
     *                      description="Product's customer group prices",
     *                      type="object",
     *                      @OA\Property(
     *                          property="customer_group_price_0",
     *                          type="object",
     *                          @OA\Property(
     *                              property="customer_group_id",
     *                              type="integer",
     *                              example=1
     *                          ),
     *                          @OA\Property(
     *                              property="qty",
     *                              type="integer",
     *                              example=2
     *                          ),
     *                          @OA\Property(
     *                              property="value_type",
     *                              type="string",
     *                              example="fixed",
     *                              enum={"discount", "fixed"}
     *                          ),
     *                          @OA\Property(
     *                              property="value",
     *                              type="float",
     *                              example=3.20
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="categories",
     *                      description="Product's categories",
     *                      type="array",
     *                      example={
     *                          "0": 1,
     *                          "1": 2
     *                      },
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="Product's channels",
     *                      type="array",
     *                      example={
     *                          "0": 1,
     *                          "1": 3,
     *                          "2": 4
     *                      },
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="variants",
     *                      description="Product's variants, `Only use in case of configurable type product (required field)`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="28",
     *                          type="object",
     *                          @OA\Property(property="sku", type="string", example="skipping-rope-variant-1-6"),
     *                          @OA\Property(property="name", type="string", example="Red-S"),
     *                          @OA\Property(property="color", format="id", type="integer", example=1),
     *                          @OA\Property(property="size", format="id", type="integer", example=6),
     *                          @OA\Property(property="price", type="float", example=10.50),
     *                          @OA\Property(property="weight", type="float", example=1.20),
     *                          @OA\Property(property="status", type="integer", example=1, enum={0,1}),
     *                          @OA\Property(
     *                              property="inventories",
     *                              type="object",
     *                              @OA\Property(property="1", type="integer", example=500),
     *                          ),
     *                          @OA\Property(
     *                              property="images[]",
     *                              type="array",
     *                              @OA\Items(type="string", format="binary"),
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="29",
     *                          type="object",
     *                          @OA\Property(property="sku", type="string", example="skipping-rope-variant-1-7"),
     *                          @OA\Property(property="name", type="string", example="Red-M"),
     *                          @OA\Property(property="color", format="id", type="integer", example=1),
     *                          @OA\Property(property="size", format="id", type="integer", example=7),
     *                          @OA\Property(property="price", type="float", example=15.00),
     *                          @OA\Property(property="weight", type="float", example=1),
     *                          @OA\Property(property="status", type="integer", example=1, enum={0,1}),
     *                          @OA\Property(
     *                              property="inventories",
     *                              type="object",
     *                              @OA\Property(property="1", type="integer", example=500),
     *                          ),
     *                          @OA\Property(
     *                              property="images[files]",
     *                              type="array",
     *                              @OA\Items(type="string", format="binary"),
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="links",
     *                      description="Product's links, `Only use in case of grouped type product (required field)`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="link_0",
     *                          type="object",
     *                          @OA\Property(property="associated_product_id", format="id", type="integer", example=1),
     *                          @OA\Property(property="qty", type="integer", example=2),
     *                          @OA\Property(property="sort_order", type="integer", example=1)
     *                      ),
     *                      @OA\Property(
     *                          property="link_1",
     *                          type="object",
     *                          @OA\Property(property="associated_product_id", format="id", type="integer", example=2),
     *                          @OA\Property(property="qty", type="integer", example=3),
     *                          @OA\Property(property="sort_order", type="integer", example=2)
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="downloadable_links",
     *                      description="Product's downloadable links, `Info: Only use in downloadable type product`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="link_0",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="title", type="string", example="Link 1")
     *                          ),
     *                          @OA\Property(property="price", type="float", example=5.00),
     *                          @OA\Property(property="type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="url", description="Only use with `type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2016/03/26/13/08/conceptual-1280533_1280.jpg"),
     *                          @OA\Property(property="sample_type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="sample_url", description="Only use with `sample_type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2016/11/22/19/11/brick-wall-1850095_1280.jpg"),
     *                          @OA\Property(property="downloads", type="integer", example=10),
     *                          @OA\Property(property="sort_order", type="integer", example=1)
     *                      ),
     *                      @OA\Property(
     *                          property="link_1",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="title", type="string", example="Link 2")
     *                          ),
     *                          @OA\Property(property="price", type="float", example=10.00),
     *                          @OA\Property(property="type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="url", description="Only use with `type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2016/03/26/13/08/conceptual-1280533_1280.jpg"),
     *                          @OA\Property(property="sample_type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="sample_url", description="Only use with `sample_type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2016/11/22/19/11/brick-wall-1850095_1280.jpg"),
     *                          @OA\Property(property="downloads", type="integer", example=20),
     *                          @OA\Property(property="sort_order", type="integer", example=2)
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="downloadable_samples",
     *                      description="Product's downloadable samples, `Info: Only use in downloadable type product`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="sample_0",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="title", type="string", example="Sample 1")
     *                          ),
     *                          @OA\Property(property="type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="url", description="Only use with `type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2017/10/04/14/50/staging-2816464_1280.jpg"),
     *                          @OA\Property(property="sort_order", type="integer", example=1)
     *                      ),
     *                      @OA\Property(
     *                          property="sample_1",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="title", type="string", example="Sample 2")
     *                          ),
     *                          @OA\Property(property="type", type="string", example="url", enum={"file", "url"}),
     *                          @OA\Property(property="url", description="Only use with `type=url`.", format="byte", type="string", example="https://cdn.pixabay.com/photo/2015/12/05/23/38/nursery-1078923_1280.jpg"),
     *                          @OA\Property(property="sort_order", type="integer", example=2)
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="bundle_options",
     *                      description="Bundle product options, `Info: Only use in bundle type product`",
     *                      type="object",
     *                      @OA\Property(
     *                          property="option_0",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="Select One")
     *                          ),
     *                          @OA\Property(property="type", type="string", example="select", enum={"select", "radio", "checkbox", "multiselect"}),
     *                          @OA\Property(property="is_required", type="integer", example=0, enum={0, 1}),
     *                          @OA\Property(property="sort_order", type="integer", example=1),
     *                          @OA\Property(
     *                              property="products",
     *                              type="object",
     *                              @OA\Property(
     *                                  property="product_0",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=1),
     *                                  @OA\Property(property="qty", type="integer", example=2),
     *                                  @OA\Property(property="sort_order", type="integer", example=1)
     *                              ),
     *                              @OA\Property(
     *                                  property="product_1",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=2),
     *                                  @OA\Property(property="qty", type="integer", example=3),
     *                                  @OA\Property(property="sort_order", type="integer", example=2)
     *                              )
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="option_1",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="Radio One")
     *                          ),
     *                          @OA\Property(property="type", type="string", example="radio", enum={"select", "radio", "checkbox", "multiselect"}),
     *                          @OA\Property(property="is_required", type="integer", example=1, enum={0, 1}),
     *                          @OA\Property(property="sort_order", type="integer", example=2),
     *                          @OA\Property(
     *                              property="products",
     *                              type="object",
     *                              @OA\Property(
     *                                  property="product_0",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=1),
     *                                  @OA\Property(property="qty", type="integer", example=2),
     *                                  @OA\Property(property="sort_order", type="integer", example=1)
     *                              ),
     *                              @OA\Property(
     *                                  property="product_1",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=2),
     *                                  @OA\Property(property="qty", type="integer", example=3),
     *                                  @OA\Property(property="sort_order", type="integer", example=2)
     *                              )
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="option_3",
     *                          type="object",
     *                          @OA\Property(
     *                              property="en",
     *                              type="object",
     *                              @OA\Property(property="label", type="string", example="Multiselect One")
     *                          ),
     *                          @OA\Property(property="type", type="string", example="multiselect", enum={"select", "radio", "checkbox", "multiselect"}),
     *                          @OA\Property(property="is_required", type="integer", example=1, enum={0, 1}),
     *                          @OA\Property(property="sort_order", type="integer", example=3),
     *                          @OA\Property(
     *                              property="products",
     *                              type="object",
     *                              @OA\Property(
     *                                  property="product_0",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=1),
     *                                  @OA\Property(property="qty", type="integer", example=2),
     *                                  @OA\Property(property="sort_order", type="integer", example=1)
     *                              ),
     *                              @OA\Property(
     *                                  property="product_1",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=2),
     *                                  @OA\Property(property="qty", type="integer", example=3),
     *                                  @OA\Property(property="sort_order", type="integer", example=2)
     *                              ),
     *                              @OA\Property(
     *                                  property="product_2",
     *                                  type="object",
     *                                  @OA\Property(property="product_id", format="id", type="integer", example=3),
     *                                  @OA\Property(property="qty", type="integer", example=1),
     *                                  @OA\Property(property="sort_order", type="integer", example=3)
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="booking",
     *                      description="Booking product options, `Info: Only use in booking type product`",
     *                      type="object",
     * 
     *                      @OA\Property(property="type", type="string", example="default", enum={"default", "appointment", "event", "rental", "table"}),
     * 
     *                      @OA\Property(property="booking_type", description="`Only use with booking type=default`", type="string", example="one", enum={"one","many"}),
     * 
     *                      @OA\Property(property="location", type="string", example="India"),
     * 
     *                      @OA\Property(property="available_every_week", description="`Use with booking type=appointment, rental, table`", type="integer", example=1, enum={0,1}),
     * 
     *                      @OA\Property(property="available_from", description="`Not use if available_every_week=1 in appointment, rental, table bookings`", format="datetime", type="string", example="2023-05-31 12:00:00"),
     * 
     *                      @OA\Property(property="available_to", description="`Not use if available_every_week=1 in appointment, rental, table bookings`", format="datetime", type="string", example="2024-05-31 12:00:00"),
     * 
     *                      @OA\Property(property="duration", description="`Not use with type=event, rental, & booking_type=one`", type="float", example=30),
     * 
     *                      @OA\Property(property="break_time", description="`Not use with type=event, rental, & booking_type=one`", type="float", example=15),
     * 
     *                      @OA\Property(property="qty", description="`Not use with booking type=event`", type="integer", example=50),
     * 
     *                      @OA\Property(property="same_slot_all_days", description="`Use with booking type=appointment, rental, table`", type="integer", example=1, enum={0,1}),
     * 
     *                      @OA\Property(
     *                          property="slots",
     *                          description="`Not use with booking type=event`",
     *                          type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="from_day", description="`Only use with type=default with booking_type=one`", type="integer", example=0, enum={0,1,2,3,4,5,6}),
     *                              @OA\Property(property="to_day", description="`Only use with type=default with booking_type=one`", type="integer", example=0, enum={0,1,2,3,4,5,6}),
     *                              @OA\Property(property="from", type="string", example="09:00"),
     *                              @OA\Property(property="to", type="string", example="11:00"),
     *                              @OA\Property(property="status", description="`Only use with booking_type=many`", type="integer", example=1, enum={0,1})
     *                          )
     *                      ),
     * 
     *                      @OA\Property(
     *                          property="tickets",
     *                          description="`Only use with booking type=event`",
     *                          type="object",
     *                          @OA\Property(
     *                              property="ticket_0",
     *                              type="object",
     *                              @OA\Property(property="en", type="object", 
     *                                  @OA\Property(property="name", type="string", example="Morning Show"),
     *                                  @OA\Property(property="description", type="string", example="Lorem Ipsum is simply dummy text of the printing and typesetting industry.")
     *                              ),
     *                              @OA\Property(property="qty", type="integer", example="150"),
     *                              @OA\Property(property="price", type="float", example=10.50),
     *                              @OA\Property(property="special_price", type="float"),
     *                              @OA\Property(property="special_price_from", format="datetime", type="string", example=null),
     *                              @OA\Property(property="special_price_to", format="datetime", type="string", example=null)
     *                          ),
     *                          @OA\Property(
     *                              property="ticket_1",
     *                              type="object",
     *                              @OA\Property(property="en", type="object", 
     *                                  @OA\Property(property="name", type="string", example="Evening Show"),
     *                                  @OA\Property(property="description", type="string", example="Lorem Ipsum is simply dummy text of the printing and typesetting industry.")
     *                              ),
     *                              @OA\Property(property="qty", type="integer", example="200"),
     *                              @OA\Property(property="price", type="float", example=22),
     *                              @OA\Property(property="special_price", type="float", example=20.50),
     *                              @OA\Property(property="special_price_from", format="datetime", type="string", example="2023-05-31 12:00:00"),
     *                              @OA\Property(property="special_price_to", format="datetime", type="string", example="2024-05-31 12:00:00")
     *                          )
     *                      ),
     * 
     *                      @OA\Property(property="renting_type", description="`Only use with booking type=rental`", type="string", example="daily_hourly", enum={"daily", "hourly", "daily_hourly"}),
     * 
     *                      @OA\Property(property="daily_price", description="`Only use with booking type=rental & renting_type=daily, daily_hourly`", type="float", example=24.00),
     * 
     *                      @OA\Property(property="hourly_price", description="`Only use with booking type=rental & renting_type=hourly, daily_hourly`", type="float", example=1.00),
     * 
     *                      @OA\Property(property="price_type", description="`Only use with booking type=table`", type="string", example="guest", enum={"guest", "table"}),
     * 
     *                      @OA\Property(property="guest_limit", description="`Only use with booking type=table & price_type=table`", type="integer", example=20),
     * 
     *                      @OA\Property(property="prevent_scheduling_before", description="`Only use with booking type=table`", type="float", example=5.00)
     *                  ),
     *                  required={"sku", "name", "url_key", "short_description", "description"}
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
     *                  example="Product updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Product"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function updateOtherTypeProduct()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/catalog/products/{id}/inventories",
     *      operationId="updateProductInventory",
     *      tags={"Products"},
     *      summary="Update the catalog product's inventory",
     *      description="Update the catalog product's inventory",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
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
     *                      property="inventories",
     *                      description="Product's inventories in key:value pair i.e. `key` is `inventory_source_id` and `value` is `quantity`",
     *                      type="object",
     *                      @OA\Property(property="1", description="Inventory source id", format="id", type="integer", example=270)
     *                  ),
     *                  required={"inventories"}
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
     *                  example="Inventory updated successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  @OA\Property(property="total", type="integer", example=150)
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function updateInventories()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/catalog/products/{id}",
     *      operationId="deleteProduct",
     *      tags={"Products"},
     *      summary="Delete catalog product by id",
     *      description="Delete catalog product by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product ID",
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
     *                  example="Product deleted successfully."),
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
     *      path="/api/v1/admin/catalog/products/mass-update",
     *      operationId="massUpdateProduct",
     *      tags={"Products"},
     *      summary="Mass update products",
     *      description="Mass update products",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="Products Ids `CommaSeperated`",
     *                      type="string",
     *                      example="1,2"
     *                  ),
     *                  @OA\Property(
     *                      property="update_value",
     *                      description="Product's status value",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  required={"indexes", "update_value"}
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
     *                  example="Selected products successfully updated."),
     *              )
     *          )
     *      )
     * )
     */
    public function massUpdate()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/catalog/products/mass-destroy",
     *      operationId="massDeleteProduct",
     *      tags={"Products"},
     *      summary="Mass delete products",
     *      description="Mass delete products",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="Products Ids `CommaSeperated`",
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
     *                  example="Selected Resource(s) successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Catalog;

class CategoryController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/catalog/categories",
	 *      operationId="getAdminCategories",
	 *      tags={"Categories"},
	 *      summary="Get category list for the shop",
     *      description="Returns category list, if you want to retrieve all categories at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category id",
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
     *                  @OA\Items(ref="#/components/schemas/Category")
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
	 *      path="/api/v1/admin/catalog/categories/{id}",
	 *      operationId="getCategory",
	 *      tags={"Categories"},
	 *      summary="Get admin category detail",
     *      description="Returns category detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
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
     *                  ref="#/components/schemas/Category"
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
     *      path="/api/v1/admin/catalog/categories",
     *      operationId="storeCategory",
     *      tags={"Categories"},
     *      summary="Store the Category",
     *      description="Store the Category",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="Category's locale i.e. `all`",
     *                      example="all",
     *                      enum={"all"}
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Category's name",
     *                      example="Home Decor"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      description="Category's status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="position",
     *                      type="integer",
     *                      description="Category's position",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="display_mode",
     *                      type="string",
     *                      description="Category's display mode",
     *                      example="products_and_description",
     *                      enum={"products_and_description", "products_only", "description_only"}
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="Category's description",
     *                      example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *                  ),
     *                  @OA\Property(
     *                      property="image",
     *                      description="Category's image",
     *                      format="byte",
     *                      type="string",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="category_icon_path",
     *                      description="Category's icon path",
     *                      format="byte",
     *                      type="string",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="parent_id",
     *                      description="Category's parent id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="attributes",
     *                      description="Category's attributes for filter",
     *                      type="array",
     *                      @OA\Items(type="integer", example=11)
     *                  ),
     *                  @OA\Property(
     *                      property="slug",
     *                      description="Category's slug",
     *                      type="string",
     *                      example="home-decor"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_title",
     *                      description="Category's meta title",
     *                      type="string",
     *                      example="Home Decor Meta Title"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_description",
     *                      description="Category's meta description",
     *                      type="string",
     *                      example="Home Decor Meta Description"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_keywords",
     *                      description="Category's meta keywords",
     *                      type="string",
     *                      example="Home Decor Meta Keywords"
     *                  ),
     *                  required={"locale", "name", "description", "slug"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Category created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Category")
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
     *      path="/api/v1/admin/catalog/categories/{id}",
     *      operationId="updateCategory",
     *      tags={"Categories"},
     *      summary="Update category",
     *      description="Update category",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
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
     *                      property="en",
     *                      description="Category's locale code i.e. `en` Info: This field is required",
     *                      type="object",
     *                      @OA\Property(property="name", type="string", description="Category's name", example="Home Decor"),
     *                      @OA\Property(property="description", type="string", description="Category's description", example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
     *                      @OA\Property(property="slug", type="string", description="Category's slug", example="home-decor-1"),
     *                      @OA\Property(property="meta_title", type="string", description="Category's meta title", example="Home Decor Meta title"),
     *                      @OA\Property(property="meta_description", type="string", description="Category's meta description", example="Home Decor Meta description"),
     *                      @OA\Property(property="meta_keywords", type="string", description="Category's meta keywords", example="Home Decor Meta keywords"),
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      description="Category's status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="position",
     *                      type="integer",
     *                      description="Category's position",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="display_mode",
     *                      type="string",
     *                      description="Category's display mode",
     *                      example="products_and_description",
     *                      enum={"products_and_description", "products_only", "description_only"}
     *                  ),
     *                  @OA\Property(
     *                      property="image",
     *                      description="Category's image",
     *                      format="byte",
     *                      type="string",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="category_icon_path",
     *                      description="Category's icon path",
     *                      format="byte",
     *                      type="string",
     *                      example=null
     *                  ),
     *                  @OA\Property(
     *                      property="parent_id",
     *                      description="Category's parent id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="attributes",
     *                      description="Category's attributes for filter",
     *                      type="array",
     *                      @OA\Items(type="integer", example=11)
     *                  )
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
     *                  example="Category updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Category"
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
     *      path="/api/v1/admin/catalog/categories/{id}",
     *      operationId="deleteCategory",
     *      tags={"Categories"},
     *      summary="Delete category by id",
     *      description="Delete category by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
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
     *                  example="Category deleted successfully."),
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
     *      path="/api/v1/admin/catalog/categories/mass-destroy",
     *      operationId="massDeleteCategories",
     *      tags={"Categories"},
     *      summary="Mass delete categories",
     *      description="Mass delete categories",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="Category's Ids `CommaSeperated`",
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
     *                  example="Selected categories successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

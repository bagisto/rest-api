<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Velocity;

class ContentController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/velocity/contents",
	 *      operationId="getVeloctyContents",
	 *      tags={"Velocity"},
	 *      summary="Get admin velocty's content list",
     *      description="Returns velocty's content list, if you want to retrieve all velocty's contents at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Velocty's Content Id",
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
     *                  @OA\Items(ref="#/components/schemas/VelocityContent")
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
	 *      path="/api/v1/admin/velocity/contents/{id}",
	 *      operationId="getVelocityContent",
	 *      tags={"Velocity"},
	 *      summary="Get admin velocity's content detail",
     *      description="Returns velocity's content detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Velocity's Content ID",
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
     *                  ref="#/components/schemas/VelocityContent"
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
     *      path="/api/v1/admin/velocity/contents",
     *      operationId="storeVelocityContent",
     *      tags={"Velocity"},
     *      summary="Store the velocity content",
     *      description="Store the velocity content",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="locale",
     *                      type="string",
     *                      description="Content's locale",
     *                      example="all",
     *                      enum={"all"}
     *                  ),
     *                  @OA\Property(
     *                      property="title",
     *                      type="string",
     *                      description="Content's title",
     *                      example="Top Selling Products"
     *                  ),
     *                  @OA\Property(
     *                      property="position",
     *                      type="integer",
     *                      description="Content's position",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      description="Content's status",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="content_type",
     *                      type="string",
     *                      description="Content's content type",
     *                      example="category",
     *                      enum={"category"}
     *                  ),
     *                  @OA\Property(
     *                      property="locale_code",
     *                      description="Content's locale code i.e. `en` Info: This field is required.",
     *                      type="object",
     *                      @OA\Property(property="page_link", type="string", example="page/about-us"),
     *                      @OA\Property(property="link_target", type="integer", example=1, enum={0, 1})
     *                  ),
     *                  required={"locale", "title", "position", "status", "content_type"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Content created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/VelocityContent")
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
     *      path="/api/v1/admin/velocity/contents/{id}",
     *      operationId="updateVelocityContent",
     *      tags={"Velocity"},
     *      summary="Update velocity content",
     *      description="Update velocity content",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Velocity Content ID",
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
     *                      property="locale",
     *                      type="string",
     *                      description="Content's locale",
     *                      example="en"
     *                  ),
     *                  @OA\Property(
     *                      property="position",
     *                      type="integer",
     *                      description="Content's position",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      description="Content's status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="content_type",
     *                      type="string",
     *                      description="Content's content type",
     *                      example="category",
     *                      enum={"category"}
     *                  ),
     *                  @OA\Property(
     *                      property="en",
     *                      description="Content's locale code i.e. `en` Info: This field is required.",
     *                      type="object",
     *                      @OA\Property(property="title", type="string", description="Content's title", example="Offered Products"
     *                  ),
     *                      @OA\Property(property="page_link", type="string", example="offered-products"),
     *                      @OA\Property(property="link_target", type="integer", example=0, enum={0, 1})
     *                  ),
     *                  required={"locale", "title", "position", "status", "content_type"}
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
     *                  example="Content updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/VelocityContent"
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
     *      path="/api/v1/admin/velocity/contents/{id}",
     *      operationId="deleteVelocityContent",
     *      tags={"Velocity"},
     *      summary="Delete velocity content by id",
     *      description="Delete velocity content by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Velocity Content ID",
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
     *                  example="Content deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

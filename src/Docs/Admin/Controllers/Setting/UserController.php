<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Setting;

class UserController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/settings/users",
	 *      operationId="getUsers",
	 *      tags={"Users"},
	 *      summary="Get admin users list",
     *      description="Returns user list, if you want to retrieve all users at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *                  @OA\Items(ref="#/components/schemas/User")
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
	 *      path="/api/v1/admin/settings/users/{id}",
	 *      operationId="getUser",
	 *      tags={"Users"},
	 *      summary="Get admin user detail",
     *      description="Returns user detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User ID",
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
     *                  ref="#/components/schemas/User"
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
     *      path="/api/v1/admin/settings/users",
     *      operationId="storeUsers",
     *      tags={"Users"},
     *      summary="Store the user",
     *      description="Store the user",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="User Full Name",
     *                      example="Peter Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="email",
     *                      example="peter@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="password",
     *                      example="admin123"
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      type="password",
     *                      example="admin123"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="role_id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"name", "email", "password", "password_confirmation", "role_id"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="User created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/User")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"message":"The code may not be greater than 3 characters."}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/settings/users/{id}",
     *      operationId="updateUsers",
     *      tags={"Users"},
     *      summary="Update user",
     *      description="Update user",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User ID",
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
     *                      property="name",
     *                      type="string",
     *                      description="User Full Name",
     *                      example="Peter Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="email",
     *                      example="peter@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="password",
     *                      example="admin123"
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      type="password",
     *                      example="admin123"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="role_id",
     *                      format="id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"name", "email", "password", "password_confirmation", "role_id"}
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
     *                  example="User updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/User"
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
     *      path="/api/v1/admin/settings/users/{id}",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      summary="Delete user by id",
     *      description="Delete user by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *                  example="Admin deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

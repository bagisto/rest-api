<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Customers;

class ReviewController
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/customers/reviews",
     *      operationId="getCustomerReviews",
     *      tags={"Customer Reviews"},
     *      summary="Get customer review list",
     *      description="Returns customer review list, if you want to retrieve all customer reviews at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Review Id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/Review")
     *              ),
     *
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
     *      path="/api/v1/admin/customers/reviews/{id}",
     *      operationId="getCustomerReview",
     *      tags={"Customer Reviews"},
     *      summary="Get customer review detail",
     *      description="Returns customer review detail",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Review ID",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Review"
     *              )
     *          )
     *      )
     * )
     */
    public function get()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/customers/reviews/{id}",
     *      operationId="updateCustomerReview",
     *      tags={"Customer Reviews"},
     *      summary="Update customer review",
     *      description="Update customer review",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Review ID",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="status",
     *                      description="Review's status",
     *                      type="string",
     *                      example="approved",
     *                      enum={"pending", "approved", "disapproved"}
     *                  ),
     *                  required={"status"}
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Review updated successfully."
     *              )
     *          )
     *      ),
     *
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
     *      path="/api/v1/admin/customers/reviews/{id}",
     *      operationId="deleteCustomerReview",
     *      tags={"Customer Reviews"},
     *      summary="Delete customer review by id",
     *      description="Delete customer review by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Review ID",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Review deleted successfully."),
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
     *      path="/api/v1/admin/customers/reviews/mass-destroy",
     *      operationId="massDeleteCustomerReview",
     *      tags={"Customer Reviews"},
     *      summary="Mass delete customer review by id",
     *      description="Mass delete customer review by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="indices",
     *                      description="Review's Ids `CommaSeperated`",
     *                      type="string",
     *                      example={1,2}
     *                  ),
     *                  required={"indices"}
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Selected reviews deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/customers/reviews/mass-update",
     *      operationId="massUpdateCustomerReview",
     *      tags={"Customer Reviews"},
     *      summary="Mass update customer review by id",
     *      description="Mass update customer review by id",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="indices",
     *                      description="Review's Ids `CommaSeperated`",
     *                      type="string",
     *                      example={1,2}
     *                  ),
     *                  @OA\Property(
     *                      property="value",
     *                      description="Review's status",
     *                      type="integer",
     *                      example="approved",
     *                      enum={"approved", "disapproved", "pending"}
     *                  ),
     *                  required={"indices", "value"}
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Selected reviews successfully updated."),
     *              )
     *          )
     *      )
     * )
     */
    public function massUpdate()
    {
    }
}

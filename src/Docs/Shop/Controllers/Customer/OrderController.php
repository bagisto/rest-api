<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class OrderController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/orders",
     *      operationId="getCustomerOrders",
     *      tags={"Orders"},
     *      summary="Get logged in customer's orders",
     *      description="Returns order list, if you want to retrieve all orders at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
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
     *                  @OA\Items(ref="#/components/schemas/Order")
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
    public function list() {}

    /**
     * @OA\Get(
     *      path="/api/v1/customer/orders/{id}",
     *      operationId="getCustomerOrderDetail",
     *      tags={"Orders"},
     *      summary="Get customer's order by id",
     *      description="Returns customer's order by id",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
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
     *                  ref="#/components/schemas/Order"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function get() {}

    /**
     * @OA\Post(
     *      path="/api/v1/customer/orders/{id}/cancel",
     *      operationId="cancelCustomerOrder",
     *      tags={"Orders"},
     *      summary="Cancel customer's order by id",
     *      description="Cancel customer's order by id",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
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
     *                  example="Order canceled successfully."
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function cancel() {}

    /**
     * @OA\Get(
     *      path="/api/v1/customer/orders/reorder/{id}",
     *      operationId="ReOrder",
     *      tags={"Orders"},
     *      summary="Customer Reorder",
     *      description="This endpoint adds order items to the customer's cart for reordering. After successfully adding items to the cart, the customer should proceed with the checkout process via the checkout APIs.",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Order id",
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
     *                  ref="#/components/schemas/Cart"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="title",
     *                  type="string",
     *                  example="404 Page Not Found"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Oops! The page you're looking for is on vacation. It seems we couldn't find what you were searching for."
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Order can not be reordered"
     *              )
     *          )
     *      ),
     * )
     */
    public function reorder() {}
}

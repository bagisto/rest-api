<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing;

class CartRuleCouponController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/promotions/cart-rules/{cart_rule_id}/coupons",
	 *      operationId="getCartRuleCoupons",
	 *      tags={"CartRuleCoupons"},
	 *      summary="Get admin cart rule's coupon list",
     *      description="Returns cart rule's coupon list",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="cart_rule_id",
     *          description="Cart Rule Id",
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
     *                  @OA\Items(ref="#/components/schemas/CartRuleCoupon")
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
	 *      path="/api/v1/admin/promotions/cart-rules/{cart_rule_id}/coupons/{id}",
	 *      operationId="getCartRuleCoupon",
	 *      tags={"CartRuleCoupons"},
	 *      summary="Get admin cart rule's coupon detail",
     *      description="Returns cart rule's coupon detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="cart_rule_id",
     *          description="Cart Rule Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart Rule's Coupon ID",
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
     *                  ref="#/components/schemas/CartRuleCoupon"
     *              )
     *          )
     *      )
	 * )
	 */
	public function show()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/promotions/cart-rules/{cart_rule_id}/coupons",
     *      operationId="storeCartRuleCoupon",
     *      tags={"CartRuleCoupons"},
     *      summary="Store the cart rule's coupon",
     *      description="Store the cart rule's coupon",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="cart_rule_id",
     *          description="Cart Rule Id",
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
     *                      property="coupon_qty",
     *                      type="integer",
     *                      description="Number of coupon want to create",
     *                      example=5
     *                  ),
     *                  @OA\Property(
     *                      property="code_length",
     *                      type="integer",
     *                      description="Code length",
     *                      example=10
     *                  ),
     *                  @OA\Property(
     *                      property="code_format",
     *                      type="string",
     *                      description="Code format",
     *                      example="alphanumeric",
     *                      enum={"alphanumeric", "alphabetical", "numeric"}
     *                  ),
     *                  @OA\Property(
     *                      property="code_prefix",
     *                      type="string",
     *                      description="Code prefix",
     *                      example="CAP"
     *                  ),
     *                  @OA\Property(
     *                      property="code_suffix",
     *                      type="string",
     *                      description="Code prefix",
     *                      example="**"
     *                  ),
     *                  required={"coupon_qty", "code_length", "code_format"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Cart rule coupon created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CartRuleCoupon")
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
     * @OA\Delete(
     *      path="/api/v1/admin/promotions/cart-rules/{cart_rule_id}/coupons/{id}",
     *      operationId="deleteCartRuleCoupon",
     *      tags={"CartRuleCoupons"},
     *      summary="Delete cart rule's coupon by id",
     *      description="Delete cart rule's coupon by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="cart_rule_id",
     *          description="Cart Rule Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart Rule's Coupon ID",
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
     *                  example="Cart rule coupon deleted successfully."),
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
     *      path="/api/v1/admin/promotions/cart-rules/{cart_rule_id}/coupons/mass-destroy",
     *      operationId="massDeleteCoupon",
     *      tags={"CartRuleCoupons"},
     *      summary="Mass delete cart rule's coupon",
     *      description="Mass delete cart rule's coupon",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="cart_rule_id",
     *          description="Cart Rule Id",
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
     *                      property="indexes",
     *                      description="Coupon's Ids `CommaSeperated`",
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
     *                  example="Selected cart rule coupons successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

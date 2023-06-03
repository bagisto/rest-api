<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing;

class CartRuleController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/promotions/cart-rules",
	 *      operationId="getCartRules",
	 *      tags={"CartRules"},
	 *      summary="Get admin cart rule list",
     *      description="Returns cart rule list, if you want to retrieve all cart rules at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart Rule Id",
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
     *                  @OA\Items(ref="#/components/schemas/CartRule")
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
	 *      path="/api/v1/admin/promotions/cart-rules/{id}",
	 *      operationId="getCartRule",
	 *      tags={"CartRules"},
	 *      summary="Get admin cart rule detail",
     *      description="Returns cart rule detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart Rule ID",
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
     *                  ref="#/components/schemas/CartRule"
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
     *      path="/api/v1/admin/promotions/cart-rules",
     *      operationId="storeCartRule",
     *      tags={"CartRules"},
     *      summary="Store the cart rule",
     *      description="Store the cart rule",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="cart rule name",
     *                      example="Offer 10%"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="cart rule description",
     *                      example="Buy 2 time & get 10% off"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="ingerer",
     *                      description="cart rule status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="cart rule will applicable on which channels?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="customer_groups",
     *                      description="cart rule will applicable on which customer's groups?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="coupon_type",
     *                      description="Cart rule coupon type, i.e. `0` is used for `No Coupon` and `1` is for `Specific Coupon`",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="use_auto_generation",
     *                      description="Want to generate coupon auto or manual. Only use if `coupon_type` is set `1` (i.e. `0` is used for `No` and `1` is for `Yes`)",
     *                      type="integer",
     *                      example=0
     *                  ),
     *                  @OA\Property(
     *                      property="coupon_code",
     *                      description="Provide coupon code manually.  Only use if `coupon_type` is set `1` and `use_auto_generation` is set to `0`",
     *                      type="string",
     *                      example="FLAT10"
     *                  ),
     *                  @OA\Property(
     *                      property="uses_per_coupon",
     *                      description="Provide coupon use count. Only use if `coupon_type` is set `1`",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="usage_per_customer",
     *                      description="Provide use count for a customer.",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="starts_from",
     *                      description="cart rule will applicable from date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-25"
     *                  ),
     *                  @OA\Property(
     *                      property="ends_till",
     *                      description="cart rule will applicable till date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-31"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="cart rule priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="condition_type",
     *                      description="cart rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
     *                      type="integer",
     *                      example=1,
     *                      enum={1, 2}
     *                  ),
     *                  @OA\Property(
     *                      property="conditions",
     *                      description="cart rule conditions",
     *                      type="array",
     *                      example={{
     *                          "value": "2",
     *                          "operator": ">=",
     *                          "attribute": "cart|items_qty",
     *                          "attribute_type": "integer"
     *                      }},
     *                      @OA\Items(
     *                          @OA\Property(property="value", type="string", example="2"),
     *                          @OA\Property(property="operator", type="string", example=">="),
     *                          @OA\Property(property="attribute", type="string", example="cart|items_qty"),
     *                          @OA\Property(property="attribute_type", type="string", example="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="action_type",
     *                      description="Action type i.e. `by_fixed` & `by_percent`",
     *                      type="string",
     *                      example="by_percent",
     *                      enum={"by_fixed", "by_percent"}
     *                  ),
     *                  @OA\Property(
     *                      property="discount_amount",
     *                      description="Provide discount amount",
     *                      type="float",
     *                      example=10.50
     *                  ),
     *                  @OA\Property(
     *                      property="discount_quantity",
     *                      description="Discount will apply on how many quantity (Maximum Quantity Allowed to be Discounted)",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="discount_step",
     *                      description="Buy X Quantity",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="apply_to_shipping",
     *                      description="Discount will apply on shipping or not. i.e. `0` is for `No` & `1` is for `Yes`",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="free_shipping",
     *                      description="Free Shipping",
     *                      type="integer",
     *                      example=0,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="end_other_rules",
     *                      description="End other rules status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"name", "channels", "customer_groups", "coupon_type", "action_type", "discount_amount"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="cart rule created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CartRule")
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
     *      path="/api/v1/admin/promotions/cart-rules/{id}",
     *      operationId="updateCartRule",
     *      tags={"CartRules"},
     *      summary="Update cart rule",
     *      description="Update cart rule",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="cart rule ID",
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
     *                      property="name",
     *                      type="string",
     *                      description="cart rule name",
     *                      example="Offer 10%"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      description="cart rule description",
     *                      example="Buy 2 time & get 10% off"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="ingerer",
     *                      description="cart rule status",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="cart rule will applicable on which channels?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="customer_groups",
     *                      description="cart rule will applicable on which customer's groups?",
     *                      type="array",
     *                      example={1, 2},
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="coupon_type",
     *                      description="Cart rule coupon type, i.e. `0` is used for `No Coupon` and `1` is for `Specific Coupon`",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="use_auto_generation",
     *                      description="Want to generate coupon auto or manual. Only use if `coupon_type` is set `1` (i.e. `0` is used for `No` and `1` is for `Yes`)",
     *                      type="integer",
     *                      example=0
     *                  ),
     *                  @OA\Property(
     *                      property="coupon_code",
     *                      description="Provide coupon code manually.  Only use if `coupon_type` is set `1` and `use_auto_generation` is set to `0`",
     *                      type="string",
     *                      example="FLAT10"
     *                  ),
     *                  @OA\Property(
     *                      property="uses_per_coupon",
     *                      description="Provide coupon use count. Only use if `coupon_type` is set `1`",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="usage_per_customer",
     *                      description="Provide use count for a customer.",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="starts_from",
     *                      description="cart rule will applicable from date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-25"
     *                  ),
     *                  @OA\Property(
     *                      property="ends_till",
     *                      description="cart rule will applicable till date",
     *                      format="date",
     *                      type="string",
     *                      example="2023-05-31"
     *                  ),
     *                  @OA\Property(
     *                      property="sort_order",
     *                      description="cart rule priority",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="condition_type",
     *                      description="cart rule condition type, i.e. `1` is used for `All Conditions are True` and `2` is for `Any Condition is True`",
     *                      type="integer",
     *                      example=1,
     *                      enum={1, 2}
     *                  ),
     *                  @OA\Property(
     *                      property="conditions",
     *                      description="cart rule conditions",
     *                      type="array",
     *                      example={{
     *                          "value": "2",
     *                          "operator": ">=",
     *                          "attribute": "cart|items_qty",
     *                          "attribute_type": "integer"
     *                      }},
     *                      @OA\Items(
     *                          @OA\Property(property="value", type="string", example="2"),
     *                          @OA\Property(property="operator", type="string", example=">="),
     *                          @OA\Property(property="attribute", type="string", example="cart|items_qty"),
     *                          @OA\Property(property="attribute_type", type="string", example="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="action_type",
     *                      description="Action type i.e. `by_fixed` & `by_percent`",
     *                      type="string",
     *                      example="by_percent",
     *                      enum={"by_fixed", "by_percent"}
     *                  ),
     *                  @OA\Property(
     *                      property="discount_amount",
     *                      description="Provide discount amount",
     *                      type="float",
     *                      example=10.50
     *                  ),
     *                  @OA\Property(
     *                      property="discount_quantity",
     *                      description="Discount will apply on how many quantity (Maximum Quantity Allowed to be Discounted)",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="discount_step",
     *                      description="Buy X Quantity",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="apply_to_shipping",
     *                      description="Discount will apply on shipping or not. i.e. `0` is for `No` & `1` is for `Yes`",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="free_shipping",
     *                      description="Free Shipping",
     *                      type="integer",
     *                      example=0,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="end_other_rules",
     *                      description="End other rules status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"name", "channels", "customer_groups", "coupon_type", "action_type", "discount_amount"}
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
     *                  example="cart rule updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/CartRule"
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
     *      path="/api/v1/admin/promotions/cart-rules/{id}",
     *      operationId="deleteCartRule",
     *      tags={"CartRules"},
     *      summary="Delete cart rule by id",
     *      description="Delete cart rule by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="cart rule ID",
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
     *                  example="Cart rule deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

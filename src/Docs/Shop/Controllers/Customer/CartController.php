<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class CartController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/cart",
     *      operationId="getCustomerCartDetail",
     *      tags={"Cart"},
     *      summary="Get customer/guest's cart",
     *      description="Returns customer/guest's cart",
     *      security={ {"sanctum": {} }},
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
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function get() {}

    /**
     * @OA\Post(
     *      path="/api/v1/customer/cart/add/{productId}",
     *      operationId="addCartItem",
     *      tags={"Cart"},
     *      summary="Add product to customer's cart",
     *      description="Add product to customer's cart",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="productId",
     *          description="Product id",
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
     *                      property="is_buy_now",
     *                      type="boolean",
     *                      description="Status for buy now",
     *                      example=0
     *                  ),
     *                  @OA\Property(
     *                      property="product_id",
     *                      type="integer",
     *                      description="Enter the product ID",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="quantity",
     *                      type="integer",
     *                      description="Enter the quantity wish to add to cart",
     *                      example=2
     *                  ),
     *                  @OA\Property(
     *                      property="selected_configurable_option",
     *                      type="integer",
     *                      description="Use in configurable type product only (Required), variant/child product id",
     *                      example=4
     *                  ),
     *                  @OA\Property(
     *                      property="super_attribute",
     *                      type="array",
     *                      description="Use in configurable type product only (Required), variant's attribute & option ids",
     *                      example={
     *                          "23": 4,
     *                          "24": 9
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="qty",
     *                      type="array",
     *                      description="Use in grouped type product only (Required), index used as simple product ID and value is quantity of simple product",
     *                      example={
     *                          "1": 2,
     *                          "2": 3
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="links",
     *                      type="array",
     *                      description="Use in downloadable type product only (Required), value used as link ID",
     *                      example={
     *                          2,
     *                          3
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="bundle_options",
     *                      type="array",
     *                      description="Use in bundle type product only (Required), index used as bundle option id & value used as bundle option's product id",
     *                      example={
     *                          "1": {1},
     *                          "3": {5},
     *                          "4": {7},
     *                          "2": {3}
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(
     *                              type="array",
     *
     *                              @OA\Items(
     *
     *                                  @OA\Property(type="integer")
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="bundle_option_qty",
     *                      type="array",
     *                      description="Use in bundle type product only (Required), value used as bundle option's product quantity",
     *                      example={
     *                          "1": 1,
     *                          "2": 3
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="booking",
     *                      type="array",
     *                      description="Use in booking type product only (Required)",
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(
     *                              property="date",
     *                              type="string",
     *                              format="datetime",
     *                              example="2025-05-07"
     *                          ),
     *                           @OA\Property(
     *                              property="date_from",
     *                              type="string",
     *                              format="datetime",
     *                              example="2025-05-07"
     *                          ),
     *                          @OA\Property(
     *                              property="date_to",
     *                              type="string",
     *                              format="datetime",
     *                              example="2025-05-14"
     *                          ),
     *                          @OA\Property(
     *                              property="renting_type",
     *                              type="string",
     *                              description="Use in rental type product only (Required)",
     *                              enum={"hourly", "daily"},
     *                              example="2025-05-14"
     *                          ),
     *                         @OA\Property(
     *                             property="slot",
     *                             type="array",
     *
     *                             @OA\Items(
     *
     *                               @OA\Property(
     *                                 property="from",
     *                                 type="integer",
     *                                 example=1746685800
     *                               ),
     *                               @OA\Property(
     *                                 property="to",
     *                                 type="integer",
     *                                 example=1746685800
     *                               ),
     *
     *                             )
     *                         ),
     *                        @OA\Property(
     *                            property="qty",
     *                            type="array",
     *                            description="Use in booking event type product only (Required), index used as event id & value as quantity",
     *                            example={
     *                               "3": 1,
     *                               "4": 2,
     *                               "5": 1
     *                            },
     *
     *                            @OA\Items(
     *
     *                                @OA\Property(type="integer")
     *                            )
     *                        ),
     *                        @OA\Property(
     *                            property="note",
     *                            type="string",
     *                            example="Use this with booking product table"
     *                        ),
     *                      )
     *                  ),
     *
     *                  required={"product_id", "quantity"}
     *              ),
     *
     *              @OA\Examples(
     *                    example="SimpleProduct",
     *                    summary="Simple Product",
     *                    value={
     *                        "product_id": 28,
     *                        "is_buy_now": 0,
     *                        "quantity": 2
     *                    }
     *              ),
     *              @OA\Examples(
     *                 example="ConfigurableAddToCart",
     *                 summary="Configurable product",
     *                 value={
     *                     "product_id": 21,
     *                     "is_buy_now": 0,
     *                     "selected_configurable_option": 22,
     *                     "super_attribute": {
     *                         "23": 4,
     *                         "24": 6
     *                     },
     *                     "quantity": 2
     *                 }
     *              ),
     *              @OA\Examples(
     *                 example="VirtualProduct",
     *                 summary="Virtual Product",
     *                 value={
     *                     "product_id": 29,
     *                     "is_buy_now": 0,
     *                     "customizable_options": {
     *                         "2": {2},
     *                         "3": {5}
     *                     },
     *                     "quantity": 1
     *                 }
     *              ),
     *              @OA\Examples(
     *                 example="GroupedProduct",
     *                 summary="Grouped Product",
     *                 value={
     *                     "product_id": 5,
     *                     "is_buy_now": 0,
     *                     "qty": {
     *                         "1": 4,
     *                         "3": 3,
     *                         "4": 2
     *                     },
     *                     "quantity": 1
     *                 }
     *              ),
     *              @OA\Examples(
     *                  example="DownloadableProduct",
     *                  summary="Downloadable Product",
     *                  value={
     *                      "product_id": 30,
     *                      "is_buy_now": 0,
     *                      "links": {
     *                          2,
     *                          3
     *                      },
     *                      "quantity": 1
     *                  }
     *             ),
     *             @OA\Examples(
     *                  example="BundleProduct",
     *                  summary="Bundle Product",
     *                  value={
     *                      "product_id": 30,
     *                      "is_buy_now": 0,
     *                      "bundle_options": {
     *                          "1": {
     *                              1
     *                          },
     *                          "2": {
     *                              3
     *                          },
     *                          "3": {
     *                              5
     *                          },
     *                          "4": {
     *                              7
     *                          }
     *                      },
     *                      "bundle_option_qty": {
     *                          "1": 1,
     *                          "2": 3
     *                      },
     *                      "quantity": 1
     *                  }
     *             ),
     *             @OA\Examples(
     *                 example="BookingDefaultProduct",
     *                 summary="Booking Product | Default",
     *                 value={
     *                     "product_id": 12,
     *                     "is_buy_now": 0,
     *                     "booking": {
     *                         "date": "2025-05-07",
     *                         "slot": "1746599400-1746714600"
     *                     },
     *                     "quantity": 2
     *                 }
     *             ),
     *             @OA\Examples(
     *                example="BookingAppointmentProduct",
     *                summary="Booking Product | Appointment",
     *                value={
     *                    "product_id": 28,
     *                    "is_buy_now": 0,
     *                    "booking": {
     *                        "date": "2025-05-08",
     *                        "slot": "1746687300-1746688500"
     *                    },
     *                    "quantity": 2
     *                }
     *            ),
     *            @OA\Examples(
     *                example="BookingRentalDailyProduct",
     *                summary="Booking Product | Rental | Daily",
     *                value={
     *                    "product_id": 14,
     *                    "is_buy_now": 0,
     *                    "booking": {
     *                        "renting_type": "daily",
     *                        "date_from": "2025-05-08",
     *                        "date_to": "2025-05-09"
     *                    },
     *                    "quantity": 2
     *               }
     *            ),
     *            @OA\Examples(
     *                example="BookingRentalHourlyProduct",
     *                summary="Booking Product | Rental | Hourly",
     *                value={
     *                    "product_id": 15,
     *                    "is_buy_now": 0,
     *                    "booking": {
     *                        "renting_type": "hourly",
     *                        "date": "2025-05-08",
     *                        "slot": {
     *                            "from": 1746685800,
     *                            "to": 1746689400
     *                        }
     *                    },
     *                    "quantity": 1
     *                }
     *            ),
     *            @OA\Examples(
     *                example="BookingEventProduct",
     *                summary="Booking Product | Event",
     *                value={
     *                    "product_id": 17,
     *                    "is_buy_now": 0,
     *                    "booking": {
     *                        "qty": {
     *                            "3": 1,
     *                            "4": 2,
     *                            "5": 1
     *                        }
     *                    },
     *                    "quantity": 1
     *                }
     *            ),
     *            @OA\Examples(
     *                example="BookingTableProduct",
     *                summary="Booking Product | Table",
     *                value={
     *                    "product_id": 18,
     *                    "is_buy_now": 0,
     *                    "booking": {
     *                        "date": "2025-05-10",
     *                        "slot": "1746864000-1746865200",
     *                        "note": "This is a requested note"
     *                    },
     *                    "quantity": 1
     *                }
     *            ),
     *
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
     *                  example="Item is successfully added to cart."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Cart"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Item cannot be added to cart, please try again later!"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function add() {}

    /**
     * @OA\Put(
     *      path="/api/v1/customer/cart/update",
     *      operationId="updateCartItem",
     *      tags={"Cart"},
     *      summary="Update cart item",
     *      description="Update cart item",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="qty",
     *                      type="array",
     *                      description="Index used as cart_item_id and value is quantity of the product, Use for all types of product (Required)",
     *                      example={
     *                          "1": 2,
     *                          "2": 3
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(type="integer")
     *                      )
     *                  ),
     *                  required={"qty"}
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
     *                  example="Cart Item(s) successfully updated."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Cart"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Quantity cannot be lesser than one."
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/cart/remove/{cartItemId}",
     *      operationId="removeCartItem",
     *      tags={"Cart"},
     *      summary="Delete item from cart using cart item id",
     *      description="Delete item from cart using cart item id",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="cartItemId",
     *          description="Cart item id",
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
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Item is successfully removed from the cart."),
     *              )
     *          )
     *      )
     * )
     */
    public function removeItem() {}

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/cart/remove",
     *      operationId="emptyCart",
     *      tags={"Cart"},
     *      summary="Delete all item from cart",
     *      description="Delete all item from cart",
     *      security={ {"sanctum": {} }},
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
     *                  example="Item is successfully removed from the cart."),
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Cart"
     *              )
     *          )
     *      )
     * )
     */
    public function remove() {}

    /**
     * @OA\Post(
     *      path="/api/v1/customer/cart/move-to-wishlist/{cartItemId}",
     *      operationId="moveToWishlistCartItem",
     *      tags={"Cart"},
     *      summary="Move cart item to customer's wishlist",
     *      description="Move cart item to customer's wishlist using cart item id",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="cartItemId",
     *          description="Cart item id",
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
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Item moved to wishlist successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function moveToWishlist() {}

    /**
     * @OA\Post(
     *      path="/api/v1/customer/cart/coupon",
     *      operationId="applyCartCoupon",
     *      tags={"Cart"},
     *      summary="Apply coupon to cart",
     *      description="Apply coupon to cart",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="code",
     *                      type="string",
     *                      example="FLAT10"
     *                  )
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
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Cart"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Coupon code applied successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function applyCoupon() {}

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/cart/coupon",
     *      operationId="removeCartCoupon",
     *      tags={"Cart"},
     *      summary="Remove cart coupon",
     *      description="Remove cart coupon",
     *      security={ {"sanctum": {} }},
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
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Coupon removed successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function removeCoupon() {}
}

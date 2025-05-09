<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class WishlistController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/wishlist",
     *      operationId="getCustomerWishlistDetail",
     *      tags={"Wishlists"},
     *      summary="Get customer's wishlist",
     *      description="Returns customer's wishlist",
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
     *                  ref="#/components/schemas/Wishlist"
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
    public function get()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/wishlist/{id}",
     *      operationId="createOrRemoveCustomerWishlist",
     *      tags={"Wishlists"},
     *      summary="Add or Remove product to customer's wishlist",
     *      description="Add or Remove product to customer's wishlist",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
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
     *                      property="product_id",
     *                      type="integer",
     *                      description="Enter the product ID",
     *                      example=1
     *                  ),
     *
     *                  @OA\Property(
     *                      property="additional",
     *                      type="array",
     *                      description="Additional data",
     *
     *                      @OA\Items(
     *                           @OA\Property(property="quantity", type="integer", example=2),
     *                           @OA\Property(property="selected_configurable_option", type="integer"),
     *                           @OA\Property(
     *                               property="super_attribute",
     *                               description="Use in configurable type product only (Required), variant's attribute & option ids",
     *                               type="array",
     *                               @OA\Items(
     *                                   @OA\Property(type="integer")
     *                               )
     *                           ),
     *                          @OA\Property(
     *                                 property="qty",
     *                                 type="array",
     *                                 description="Use in grouped type product only (Required), index used as simple product ID and value is quantity of simple product",
     *                                 example={
     *                                     "1": 2,
     *                                     "2": 3
     *                                 },
     *                                 @OA\Items(
     *                                   @OA\Property(type="integer")
     *                                 )
     *                           ),
     *                           @OA\Property(
     *                                 property="links",
     *                                 type="array",
     *                                 description="Use in downloadable type product only (Required), value used as link ID",
     *                                 example={
     *                                     2,
     *                                     3
     *                                 },
     *                                 @OA\Items(
     *                                     @OA\Property(type="integer")
     *                                 )
     *                           ),
     *                           @OA\Property(
     *                               property="bundle_options",
     *                               type="array",
     *                               description="Use in bundle type product only (Required), index used as bundle option id & value used as bundle option's product id",
     *                               example={
     *                                   "1": {1},
     *                                   "3": {5},
     *                                   "4": {7},
     *                                   "2": {3}
     *                               },
     *
     *                               @OA\Items(
     *
     *                                   @OA\Property(
     *                                       type="array",
     *
     *                                       @OA\Items(
     *
     *                                           @OA\Property(type="integer")
     *                                       )
     *                                   )
     *                               )
     *                           ),
     *                           @OA\Property(
     *                               property="bundle_option_qty",
     *                               type="array",
     *                               description="Use in bundle type product only (Required), value used as bundle option's product quantity",
     *                               example={
     *                                   "1": 1,
     *                                   "2": 3
     *                               },
     *                               @OA\Items(
     *                                   @OA\Property(type="integer")
     *                               )
     *                           ),
     *                           @OA\Property(
     *                              property="booking",
     *                              type="array",
     *                              description="Use in booking type product only (Required)",
     *
     *                              @OA\Items(
     *
     *                                  @OA\Property(
     *                                      property="date",
     *                                      type="string",
     *                                      format="datetime",
     *                                      example="2025-05-07"
     *                                  ),
     *
     *                                   @OA\Property(
     *                                      property="date_from",
     *                                      type="string",
     *                                      format="datetime",
     *                                      example="2025-05-07"
     *                                  ),
     *
     *                                  @OA\Property(
     *                                      property="date_to",
     *                                      type="string",
     *                                      format="datetime",
     *                                      example="2025-05-14"
     *                                  ),
     *
     *                                  @OA\Property(
     *                                      property="renting_type",
     *                                      type="string",
     *                                      description="Use in rental type product only (Required)",
     *                                      enum={"hourly", "daily"},
     *                                      example="2025-05-14"
     *                                  ),
     *
     *                                 @OA\Property(
     *                                     property="slot",
     *                                     type="array",
     *
     *                                     @OA\Items(
     *                                       @OA\Property(
     *                                         property="from",
     *                                         type="integer",
     *                                         example=1746685800
     *                                       ),
     *
     *                                       @OA\Property(
     *                                         property="to",
     *                                         type="integer",
     *                                         example=1746685800
     *                                       ),
     *
     *                                     )
     *                                 ),
     *                                @OA\Property(
     *                                    property="qty",
     *                                    type="array",
     *                                    description="Use in booking event type product only (Required), index used as event id & value as quantity",
     *                                    example={
     *                                      "3": 1,
     *                                      "4": 2,
     *                                      "5": 1
     *                                    },
     *                                    @OA\Items(
     *                                         @OA\Property(type="integer")
     *                                    )
     *                                ),
     *                                @OA\Property(
     *                                    property="note",
     *                                    type="string",
     *                                    example="Use this with booking product table"
     *                                ),
     *                              )
     *                           ),
     *                      )
     *                  )
     *              ),
     *
     *              @OA\Examples(
     *                    example="SimpleProduct",
     *                    summary="Simple Product",
     *                    value={
     *                        "product_id": 1,
     *                        "additional": {
     *                             "quantity": 2
     *                         }
     *                    }
     *              ),
     *              @OA\Examples(
     *                 example="ConfigurableAddToCart",
     *                 summary="Configurable product",
     *                 value={
     *                     "product_id": 21,
     *                     "additional": {
     *                        "selected_configurable_option": 22,
     *                        "super_attribute": {
     *                            "23": 4,
     *                            "24": 6
     *                        },
     *                        "quantity": 2
     *                     }
     *                 }
     *              ),
     *
     *              @OA\Examples(
     *                 example="VirtualProduct",
     *                 summary="Virtual Product",
     *                 value={
     *                     "product_id": 29,
     *                     "additional": {
     *                          "customizable_options": {
     *                              "2": {2},
     *                              "3": {5}
     *                          },
     *                          "quantity": 1
     *                     }
     *                 }
     *              ),
     *              @OA\Examples(
     *                 example="GroupedProduct",
     *                 summary="Grouped Product",
     *                 value={
     *                     "product_id": 5,
     *                     "additional": {
     *                        "qty": {
     *                            "1": 4,
     *                            "3": 3,
     *                            "4": 2
     *                        },
     *                     }
     *                 }
     *              ),
     *
     *              @OA\Examples(
     *                  example="DownloadableProduct",
     *                  summary="Downloadable Product",
     *                  value={
     *                      "product_id": 30,
     *                      "additional": {
     *                           "links": {
     *                               1,
     *                               2
     *                           },
     *                           "quantity": 1
     *                      }
     *                  }
     *             ),
     *
     *             @OA\Examples(
     *                  example="BundleProduct",
     *                  summary="Bundle Product",
     *                  value={
     *                      "product_id": 30,
     *                      "additional": {
     *                           "bundle_options": {
     *                               "1": {
     *                                   1
     *                               },
     *                               "2": {
     *                                   3
     *                               },
     *                               "3": {
     *                                   5
     *                               },
     *                               "4": {
     *                                   7
     *                               }
     *                           },
     *                           "bundle_option_qty": {
     *                               "1": 1,
     *                               "2": 3
     *                           },
     *                           "quantity": 1
     *                      }
     *                  }
     *             ),
     *             @OA\Examples(
     *                 example="BookingDefaultProduct",
     *                 summary="Booking Product | Default",
     *                 value={
     *                     "product_id": 12,
     *                      "additional": {
     *                          "booking": {
     *                              "date": "2025-05-07",
     *                              "slot": "1746599400-1746714600"
     *                          },
     *                          "quantity": 2
     *                      }
     *                 }
     *             ),
     *
     *             @OA\Examples(
     *                example="BookingAppointmentProduct",
     *                summary="Booking Product | Appointment",
     *                value={
     *                    "product_id": 28,
     *                     "additional": {
     *                        "booking": {
     *                            "date": "2025-05-08",
     *                            "slot": "1746687300-1746688500"
     *                        },
     *                        "quantity": 2
     *                     }
     *                }
     *            ),
     *            @OA\Examples(
     *                example="BookingRentalDailyProduct",
     *                summary="Booking Product | Rental | Daily",
     *                value={
     *                    "product_id": 14,
     *                    "additional": {
     *                         "booking": {
     *                             "renting_type": "daily",
     *                             "date_from": "2025-05-08",
     *                             "date_to": "2025-05-09"
     *                         },
     *                         "quantity": 2
     *                    }
     *               }
     *            ),
     *            @OA\Examples(
     *                example="BookingRentalHourlyProduct",
     *                summary="Booking Product | Rental | Hourly",
     *                value={
     *                    "product_id": 15,
     *                    "additional": {
     *                         "booking": {
     *                             "renting_type": "hourly",
     *                             "date": "2025-05-08",
     *                             "slot": {
     *                                 "from": 1746685800,
     *                                 "to": 1746689400
     *                             }
     *                         },
     *                         "quantity": 1
     *                    }
     *                }
     *            ),
     *            @OA\Examples(
     *                example="BookingEventProduct",
     *                summary="Booking Product | Event",
     *                value={
     *                    "product_id": 17,
     *                    "additional": {
     *                         "booking": {
     *                             "qty": {
     *                                 "3": 1,
     *                                 "4": 2,
     *                                 "5": 1
     *                             }
     *                         },
     *                         "quantity": 1
     *                    }
     *                }
     *            ),
     *
     *            @OA\Examples(
     *                example="BookingTableProduct",
     *                summary="Booking Product | Table",
     *                value={
     *                    "product_id": 18,
     *                    "additional": {
     *                         "booking": {
     *                             "date": "2025-05-10",
     *                             "slot": "1746864000-1746865200",
     *                             "note": "This is a requested note"
     *                         },
     *                         "quantity": 1
     *                    }
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
     *                  example="Product added/removed to wishlist successfully."
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
    public function store()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/wishlist/{id}/move-to-cart",
     *      operationId="moveToCartCustomerWishlist",
     *      tags={"Wishlists"},
     *      summary="Move Product From Wishlist To Cart",
     *      description="The quantity field is used to update the cart with a specified quantity; if not provided, the cart defaults to the quantity set when the product was originally added to the wishlist.",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="quantity",
     *          description="Product quantity",
     *          required=false,
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
     *                  property="message",
     *                  type="string",
     *                  example="Item successfully moved To cart."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Wishlist"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Selected Wishlist product not found.."
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function moveToCart()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/wishlist/all",
     *      operationId="deleteAllWishlistItems",
     *      tags={"Wishlists"},
     *      summary="Delete all wishlist items.",
     *      description="Delete all wishlists items to the customer.",
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
     *                  ref="#/components/schemas/Wishlist"
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
    public function deleteAll()
    {
    }
}

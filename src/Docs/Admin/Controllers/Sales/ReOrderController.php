<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sales;

class ReOrderController
{
     /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}",
     *      operationId="createProductReOrder",
     *      tags={"ReOrders"},
     *      summary="Create admin re-order",
     *      description="Create product re-order from admin admin section.",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
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
    public function store()
    {
    }
    /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}/save-address",
     *      operationId="saveCheckoutAddress",
     *      tags={"ReOrders"},
     *      summary="Save addresses at the checkout",
     *      description="Save addresses at the checkout",
     *      security={ {"sanctum_admin": {} }},
     * 
     *      @OA\Parameter(
     *          name="id",
     *          description="cart id",
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
     *                      property="billing",
     *                      type="array",
     *                      description="",
     *                      example={
     *                          "id": 14,
     *                          "address": {"70 Winchester Rd"},
     *                          "save_as_address": false,
     *                          "use_for_shipping": false,
     *                          "first_name": "John",
     *                          "last_name": "Doe",
     *                          "email": "john@example.com",
     *                          "company_name": "Bagisto",
     *                          "city": "Marrero",
     *                          "state": "LA",
     *                          "country": "US",
     *                          "postcode": 70072,
     *                          "phone": 9871234560
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(property="id", type="integer"),
     *                          @OA\Property(property="address", type="array", @OA\Items(
     *                              @OA\Property(type="string")
     *                          )),
     *                          @OA\Property(property="save_as_address", type="boolean"),
     *                          @OA\Property(property="use_for_shipping", type="boolean"),
     *                          @OA\Property(property="first_name", type="string"),
     *                          @OA\Property(property="last_name", type="string"),
     *                          @OA\Property(property="email", type="string"),
     *                          @OA\Property(property="company_name", type="string"),
     *                          @OA\Property(property="city", type="string"),
     *                          @OA\Property(property="state", type="string"),
     *                          @OA\Property(property="country", type="string"),
     *                          @OA\Property(property="postcode", type="integer"),
     *                          @OA\Property(property="phone", type="integer")
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="shipping",
     *                      type="array",
     *                      description="",
     *                      example={
     *                          "id": null,
     *                          "address": {"819  Farnum Road"},
     *                          "save_as_address": false,
     *                          "first_name": "John",
     *                          "last_name": "Doe",
     *                          "email": "john@example.com",
     *                          "company_name": "Bagisto",
     *                          "city": "Mansfield",
     *                          "state": "OH",
     *                          "country": "US",
     *                          "postcode": 44907,
     *                          "phone": 987654321
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(property="id", type="integer"),
     *                          @OA\Property(property="address", type="array", @OA\Items(
     *                              @OA\Property(type="string")
     *                          )),
     *                          @OA\Property(property="save_as_address", type="boolean"),
     *                          @OA\Property(property="first_name", type="string"),
     *                          @OA\Property(property="last_name", type="string"),
     *                          @OA\Property(property="email", type="string"),
     *                          @OA\Property(property="company_name", type="string"),
     *                          @OA\Property(property="city", type="string"),
     *                          @OA\Property(property="state", type="string"),
     *                          @OA\Property(property="country", type="string"),
     *                          @OA\Property(property="postcode", type="integer"),
     *                          @OA\Property(property="phone", type="integer")
     *                      )
     *                  ),
     *                  required={"billing"}
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
     *                  example="Address saved successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(
     *
     *                      @OA\Property(
     *                          property="cart",
     *                          type="object",
     *                      ),
     *                      @OA\Property(
     *                          property="rates",
     *                          type="array",
     *
     *                          @OA\Items(
     *
     *                              @OA\Property(
     *                                  property="carrier_title",
     *                                  type="string",
     *                                  example="Flat Rate"
     *                              ),
     *                              @OA\Property(
     *                                  property="rates",
     *                                  type="object",
     *                              )
     *                          )
     *                      )
     *                  )
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
    public function saveAddress()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}/save-shipping",
     *      operationId="saveCheckoutShipping",
     *      tags={"ReOrders"},
     *      summary="Save shipping method at the checkout",
     *      description="Save shipping method at the checkout",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="cart id",
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
     *              mediaType="multipart/form-data",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="shipping_method",
     *                      type="string",
     *                      example="flatrate_flatrate",
     *                  ),
     *                  required={"shipping_method"}
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
     *                  example="Shipping method saved successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(
     *
     *                      @OA\Property(
     *                          property="cart",
     *                          type="object",
     *                      ),
     *                  )
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
    public function saveShipping()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}/save-payment",
     *      operationId="saveCheckoutPayment",
     *      tags={"ReOrders"},
     *      summary="Save payment method at the checkout",
     *      description="Save payment method at the checkout",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="cart id",
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
     *                      property="payment",
     *                      type="array",
     *                      example={
     *                          "method": "cashondelivery"
     *                      },
     *
     *                      @OA\Items(
     *
     *                          @OA\Property(property="method", type="string")
     *                      )
     *                  ),
     *                  required={"payment"}
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
     *                  example="Payment method saved successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(
     *
     *                      @OA\Property(
     *                          property="cart",
     *                          type="object",
     *                      )
     *                  )
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
    public function savePayment()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/sales/re-orders/{id}/save-order",
     *      operationId="saveCheckoutOrder",
     *      tags={"ReOrders"},
     *      summary="Save payment method at the checkout",
     *      description="Save payment method at the checkout",
     *      security={ {"sanctum_admin": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="cart id",
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
     *                  example="Order was successfully placed."
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

    public function saveOrder()
    {
    }
}
<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class AccountController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/get",
     *      operationId="getCustomer",
     *      tags={"Customers"},
     *      summary="Get logged in customer details",
     *      description="Get logged in customer details",
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
     *                  ref="#/components/schemas/Customer"
     *              )
     *          )
     *       ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function get()
    {
    }

    /**
    * @OA\Post(
    *      path="/api/v1/customer/profile",
    *      operationId="updateCustomer",
    *      tags={"Customers"},
    *      summary="Update customer profile",
    *      description="Update customer profile",
    *      security={ {"sanctum": {} }},
    *
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\MediaType(
    *              mediaType="multipart/form-data",
    *              @OA\Schema(
    *                  @OA\Property(
    *                      property="_method",
    *                      type="string",
    *                      example="PUT"
    *                  ),
    *                  @OA\Property(
    *                      property="first_name",
    *                      type="string",
    *                      example="John"
    *                  ),
    *                  @OA\Property(
    *                      property="last_name",
    *                      type="string",
    *                      example="Doe"
    *                  ),
    *                  @OA\Property(
    *                      property="gender",
    *                      type="string",
    *                      example="Male"
    *                  ),
    *                  @OA\Property(
    *                      property="date_of_birth",
    *                      type="string",
    *                      example="2002-02-19"
    *                  ),
    *                  @OA\Property(
    *                      property="phone",
    *                      type="string",
    *                      example="1234567899"
    *                  ),
    *                  @OA\Property(
    *                      property="email",
    *                      type="string",
    *                      format="email",
    *                      example="example@example.com"
    *                  ),
    *                  @OA\Property(
    *                      property="current_password",
    *                      type="string",
    *                      format="password",
    *                      example="admin123"
    *                  ),
    *                  @OA\Property(
    *                      property="new_password",
    *                      type="string",
    *                      format="password",
    *                      example="admin123"
    *                  ),
    *                  @OA\Property(
    *                      property="new_password_confirmation",
    *                      type="string",
    *                      format="password",
    *                      example="admin123"
    *                  ),
    *                  @OA\Property(
    *                      property="image[]",
    *                      type="array",
    *                      @OA\Items(type="file"),
    *                      description="Customer Profile Image"
    *                  ),
    *                  @OA\Property(
    *                      property="subscribed_to_news_letter",
    *                      type="boolean"
    *                  ),
    *                  required={"first_name", "last_name", "gender", "date_of_birth", "email", "phone"}
    *              )
    *          )
    *      ),
    *
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *
    *          @OA\JsonContent(
    *              @OA\Property(property="message", type="string", example="Your account has been updated successfully."),
    *              @OA\Property(property="data", type="object", ref="#/components/schemas/Customer")
    *          )
    *      ),
    *
    *      @OA\Response(
    *          response=422,
    *          description="Error: Unprocessable Content",
    *
    *          @OA\JsonContent(
    *              @OA\Examples(example="result", value={"message":"The email has already been taken.","errors":{"email":{"The email has already been taken."}}}, summary="An result object.")
    *          )
    *      )
    * )
    */
    public function update()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/logout",
     *      operationId="logoutCustomer",
     *      tags={"Customers"},
     *      summary="Logout customer",
     *      description="Logout customer",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(property="message", type="string", example="Logged out successfully.")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function logout()
    {
    }
}

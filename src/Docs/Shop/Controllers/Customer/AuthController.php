<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class AuthController
{
    /**
     * @OA\Post(
     *      path="/api/v1/customer/login",
     *      operationId="customerLogin",
     *      tags={"Customers"},
     *      summary="Login customer",
     *      description="Login customer",
     *
     *      @OA\Parameter(
     *          name="accept_token",
     *          description="Accept Token Flag",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="bool"
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
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      example="shop@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      example="demo123"
     *                  ),
     *                  @OA\Property(
     *                      property="device_name",
     *                      type="string",
     *                      example="android"
     *                  ),
     *                  required={"email", "password"}
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
     * 					property="message",
     * 					type="string",
     * 					example="Logged in successfully."
     *				),
     *				@OA\Property(
     * 					property="data",
     * 					type="object",
     * 					ref="#/components/schemas/Customer"
     *				)
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     * 					property="message",
     * 					type="string",
     * 					example="Invalid Email or Password"
     * 				)
     *          )
     *      )
     * )
     */
    public function login()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/register",
     *      operationId="registerCustomer",
     *      tags={"Customers"},
     *      summary="Register customer",
     *      description="Register customer",
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *
     *              @OA\Schema(
     *
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
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      example="shop@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      example="admin123"
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      type="string",
     *                      format="password",
     *                      example="admin123"
     *                  ),
     *                  required={"first_name", "last_name", "email", "password", "password_confirmation"}
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
     *              @OA\Property(property="message", type="string", example="Customer registered successfully.")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(property="message", type="string", example="Invalid Request Parameters")
     *          )
     *      )
     * )
     */
    public function register()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/forgot-password",
     *      operationId="customerForgotPassword",
     *      tags={"Customers"},
     *      summary="Forgot Password customer",
     *      description="Forgot Password customer",
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      example="example@example.com"
     *                  ),
     *                  required={"email"}
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
     *              @OA\Property(property="message", type="string", example="We have e-mailed your reset password link.")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(property="message", type="string", example="We can't find a user with that e-mail address.")
     *          )
     *      )
     * )
     */
    public function forgotPassword()
    {
    }
}

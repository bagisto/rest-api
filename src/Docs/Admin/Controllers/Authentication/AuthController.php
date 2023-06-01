<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Authentication;

class AuthController
{
	/**
	 * @OA\Post(
	 *      path="/api/v1/admin/login",
	 *      operationId="adminLogin",
	 *      tags={"Authentication"},
	 *      summary="Login admin user",
	 *      description="Login admin user",
	 *      @OA\RequestBody(
	 *          @OA\MediaType(
	 *              mediaType="multipart/form-data",
	 *              @OA\Schema(
	 *                  @OA\Property(
	 *                      property="email",
	 *                      type="string",
	 *                      format="email",
	 *                      example="admin@example.com"
	 *                  ),
	 *                  @OA\Property(
	 *                      property="password",
	 *                      type="string",
	 *                      format="password",
	 *                      example="admin123"
	 *                  ),
	 *                  @OA\Property(
	 *                      property="device_name",
	 *                      type="string",
	 *                      example="android"
	 *                  ),
	 *                  required={"email", "password", "device_name"}
	 *              )
	 *          )
	 *      ),
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="Logged in successfully."
	 *				),
     *				@OA\Property(
	 * 					property="data",
	 * 					type="object",
	 * 					ref="#/components/schemas/User"
	 *				)
	 *          )
	 *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
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
	 *      path="/api/v1/admin/forgot-password",
	 *      operationId="adminForgotPassword",
	 *      tags={"Authentication"},
	 *      summary="Admin user's forgot password",
	 *      description="Admin user's forgot password",
	 *      @OA\RequestBody(
	 *          @OA\MediaType(
	 *              mediaType="multipart/form-data",
	 *              @OA\Schema(
	 *                  @OA\Property(
	 *                      property="email",
	 *                      type="string",
	 *                      format="email",
	 *                      example="admin@example.com"
	 *                  ),
	 *                  required={"email"}
	 *              )
	 *          )
	 *      ),
	 *      @OA\Response(
	 *          response=200,
	 *          description="Successful operation",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="We have e-mailed your password reset link!"
	 *				)
	 *          )
	 *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="Warning: You have requested password reset recently, please check your email."
	 * 				)
	 *          )
	 *      )
	 * )
	 */
	public function forgotPassword()
	{
	}
}

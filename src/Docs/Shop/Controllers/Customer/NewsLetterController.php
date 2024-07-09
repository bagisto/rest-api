<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class NewsLetterController
{
    /**
     * @OA\Post(
     *      path="/api/v1/customer/subscription",
     *      operationId="createSubscription",
     *      tags={"Newsletter"},
     *      summary="Add subscription by customer",
     *      description="Add subscription by customer",
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
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                      example=""
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
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="You have successfully subscribed to our newsletter."
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
}

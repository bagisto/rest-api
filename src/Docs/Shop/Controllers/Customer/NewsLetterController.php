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
     *      @OA\Parameter(
     *          name="email",
     *          description="Email Id",
     *          required=true,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
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

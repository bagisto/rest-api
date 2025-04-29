<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class GDPRController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/gdpr",
     *      operationId="getCustomerGDPRList",
     *      tags={"GDPR"},
     *      summary="Get GDPR Requests List for Logged-in Customer",
     *      description="Returns a list of GDPR data requests submitted by the logged-in customer. Supports pagination and sorting.",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="GDPR id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * 
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort column",
     *          example="id",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     * 
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="string",
     *              enum={"desc", "asc"}
     *          )
     *      ),
     * 
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="query",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="limit",
     *          description="Limit",
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
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/GDPR")
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
     *      path="/api/v1/customer/gdpr/{id}",
     *      operationId="getCustomerGDPRDetail",
     *      tags={"GDPR"},
     *      summary="Get GDPR Request Detail by ID for Logged-in Customer",
     *      description="Returns detailed information of a specific GDPR data request identified by ID for the logged-in customer.",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="GDPR request ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/GDPR"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="GDPR Request Not Found"
     *      )
     * )
     */
    public function get()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/gdpr",
     *      operationId="createGDPRRequest",
     *      tags={"GDPR"},
     *      summary="Create GDPR Request",
     *      description="Create GDPR Request for Logged-in Customer",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="type",
     *                      type="string",
     *                      example="delete",
     *                      description="Type of GDPR request (e.g., 'delete', 'update')"
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string",
     *                      example="Delete my account and all associated data.",
     *                  ),
     *                  required={"type", "message"}
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Your GDPR Request has been created successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/GDPR"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message":"The Type field is required.","errors":{"type":{"The Type field is required."}}},
     *                  summary="An result object."
     *              )
     *          )
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/customer/gdpr/revoke/{id}",
     *      operationId="revokeGDPRRequest",
     *      tags={"GDPR"},
     *      summary="Revoke GDPR Request",
     *      description="Revokes a pending GDPR data request for the logged-in customer by ID",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="GDPR request ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Your GDPR request has been revoked successfully."
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/GDPR"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="GDPR request not found or cannot be revoked",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Unable to revoke GDPR request."
     *              )
     *          )
     *      )
     * )
     */
    public function revoke()
    {
    }
}

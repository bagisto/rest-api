<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing;

class CampaignController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/promotions/campaigns",
	 *      operationId="getCampaigns",
	 *      tags={"Campaigns"},
	 *      summary="Get admin campaign list",
     *      description="Returns campaign list, if you want to retrieve all campaigns at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Campaign Id",
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
     *                  @OA\Items(ref="#/components/schemas/Campaign")
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
	 *      path="/api/v1/admin/promotions/campaigns/{id}",
	 *      operationId="getCampaign",
	 *      tags={"Campaigns"},
	 *      summary="Get admin campaign detail",
     *      description="Returns campaign detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Campaign ID",
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
     *                  ref="#/components/schemas/Campaign"
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
     *      path="/api/v1/admin/promotions/campaigns",
     *      operationId="storeCampaign",
     *      tags={"Campaigns"},
     *      summary="Store the campaign",
     *      description="Store the campaign",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Campaign's name",
     *                      example="Birthday Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="subject",
     *                      type="string",
     *                      description="Campaign's subject",
     *                      example="Birthday Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      description="Campaign's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="marketing_template_id",
     *                      description="Email Template ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="marketing_event_id",
     *                      description="Event ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="Channel ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="customer_group_id",
     *                      description="Customer Group ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"name", "subject", "status", "marketing_template_id", "marketing_event_id", "channel_id", "customer_group_id"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Campaign created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Campaign")
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
     *      path="/api/v1/admin/promotions/campaigns/{id}",
     *      operationId="updateCampaign",
     *      tags={"Campaigns"},
     *      summary="Update campaign",
     *      description="Update campaign",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Campaign ID",
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
     *                      description="Campaign's name",
     *                      example="Birthday Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="subject",
     *                      type="string",
     *                      description="Campaign's subject",
     *                      example="Birthday Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      description="Campaign's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0,1}
     *                  ),
     *                  @OA\Property(
     *                      property="marketing_template_id",
     *                      description="Email Template ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="marketing_event_id",
     *                      description="Event ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="Channel ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="customer_group_id",
     *                      description="Customer Group ID",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"name", "subject", "status", "marketing_template_id", "marketing_event_id", "channel_id", "customer_group_id"}
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
     *                  example="Campaign updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Campaign"
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
     *      path="/api/v1/admin/promotions/campaigns/{id}",
     *      operationId="deleteCampaign",
     *      tags={"Campaigns"},
     *      summary="Delete campaign by id",
     *      description="Delete campaign by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Campaign ID",
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
     *                  example="Campaign deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

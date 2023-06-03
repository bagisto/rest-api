<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Sale;

class ShipmentController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/sales/shipments",
	 *      operationId="getOrderShipments",
	 *      tags={"Shipments"},
	 *      summary="Get admin order's shipments list",
     *      description="Returns order's shipments list, if you want to retrieve all shipments at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Shipment id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order_id",
     *          description="Order id",
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
     *                  @OA\Items(ref="#/components/schemas/Shipment")
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
	 *      path="/api/v1/admin/sales/shipments/{id}",
	 *      operationId="getOrderShipmentDetail",
	 *      tags={"Shipments"},
	 *      summary="Get admin order's Shipment detail",
     *      description="Returns order's Shipment detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Shipment id",
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
     *                  ref="#/components/schemas/Shipment"
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
     *      path="/api/v1/admin/sales/shipments/{order_id}",
     *      operationId="storeOrderShipment",
     *      tags={"Shipments"},
     *      summary="Create shipment for an order",
     *      description="Create shipment for an order",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="order_id",
     *          description="Order id",
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
     *                      property="shipment",
     *                      type="object",
     *                      @OA\Property(
     *                          property="carrier_title",
     *                          type="string",
     *                          description="Provide the carrier title for the shipment",
     *                          example="DHL Shipment"
     *                      ),
     *                      @OA\Property(
     *                          property="track_number",
     *                          type="string",
     *                          description="Provide the track number for the shipment",
     *                          example="12345"
     *                      ),
     *                      @OA\Property(
     *                          property="source",
     *                          type="integer",
     *                          description="Provide the inventory source id, from which inventory you want to ship the product.",
     *                          example=1
     *                      ),
     *                      @OA\Property(
     *                          property="items",
     *                          type="object",
     *                          description="Provide the Order item id as key)",
     *                          @OA\Property(
     *                              property=8,
     *                              type="object",
     *                              @OA\Property(
     *                                  property=1,
     *                                  description="Provide the inventory source id as key and quantity to shipment as value (Key:value i.e. inventory_source_id:quantity_to_ship)",
     *                                  type="integer",
     *                                  example=1
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  required={"shipment"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Shipment created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Shipment")
     *          )
     *      ),
	 *      @OA\Response(
	 *          response=400,
	 *          description="Bad Request",
	 *          @OA\JsonContent(
	 *              @OA\Property(
	 * 					property="message",
	 * 					type="string",
	 * 					example="Order shipment creation is not allowed."
	 * 				)
	 *          )
	 *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message":"The shipment.items.0 must be a number."},
     *                  summary="An result object."
     *              )
     *          )
     *      )
     * )
     */
    public function store()
    {
    }
}

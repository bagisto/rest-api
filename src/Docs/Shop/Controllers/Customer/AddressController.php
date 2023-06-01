<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class AddressController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/customer/addresses",
	 *      operationId="getCustomerAddresses",
	 *      tags={"Addresses"},
	 *      summary="Get logged in customer's address list",
     *      description="Returns address list, if you want to retrieve all addresses at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address id",
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
     *                  @OA\Items(ref="#/components/schemas/Address")
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
     *      path="/api/v1/customer/addresses/{id}",
     *      operationId="getCustomerAddressDetail",
     *      tags={"Addresses"},
     *      summary="Get customer's address by id",
     *      description="Returns customer's address by id",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address id",
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
     *                  ref="#/components/schemas/Address"
     *              )
     *          )
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
     *      path="/api/v1/customer/addresses",
     *      operationId="createCustomer",
     *      tags={"Addresses"},
     *      summary="Create customer's address",
     *      description="Create customer's address",
     *      security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="company_name",
     *                      type="string",
     *                      example="Webkul"
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
     *                      property="address1",
     *                      type="array",
     *                      @OA\Items(type="string")
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="US (e.g. United States)",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="CA (e.g. California)",
     *                      example="CA"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      example="Oakland"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      type="integer",
     *                      example="94606"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="integer",
     *                      example="9876543210"
     *                  ),
     *                  @OA\Property(
     *                      property="vat_id",
     *                      type="string",
     *                      example="INV01234567891"
     *                  ),
     *                  required={"first_name", "last_name", "address1", "country", "state", "city", "postcode", "phone"}
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
     *                  example="Your address has been created successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Address"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"message":"The first name field is required.","errors":{"first_name":{"The first name field is required."}}}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *      path="/api/v1/customer/addresses/{id}",
     *      operationId="updateCustomerAddress",
     *      tags={"Addresses"},
     *      summary="Update customer's address",
     *      description="Update customer's address",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address id",
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
     *                      property="company_name",
     *                      type="string",
     *                      example="Webkul"
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
     *                      property="address1",
     *                      type="array",
     *                      @OA\Items(type="string")
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="US (e.g. United States)",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="CA (e.g. California)",
     *                      example="CA"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      example="Oakland"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      type="integer",
     *                      example="94606"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="integer",
     *                      example="9876543210"
     *                  ),
     *                  @OA\Property(
     *                      property="vat_id",
     *                      type="string",
     *                      example="INV01234567891"
     *                  ),
     *                  required={"first_name", "last_name", "address1", "country", "state", "city", "postcode", "phone"}
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
     *                  example="Your address has been updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Address"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"message":"The first name field is required.","errors":{"first_name":{"The first name field is required."}}}, summary="An result object."),
     *          )
     *      )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/addresses/{id}",
     *      operationId="deleteCustomerAddress",
     *      tags={"Addresses"},
     *      summary="Delete customer's address by id",
     *      description="Delete customer's address by id",
     *      security={ {"sanctum": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address id",
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
     *                  example="Address Deleted Successfully."),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy()
    {
    }
}
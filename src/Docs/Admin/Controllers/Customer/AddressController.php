<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Customer;

class AddressController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/customers/{customer_id}/addresses",
	 *      operationId="getCustomerAddresses",
	 *      tags={"CustomerAddresses"},
	 *      summary="Get admin customer address list",
     *      description="Returns customer address list, if you want to retrieve all customer addresses at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Address Id",
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
	 *      path="/api/v1/admin/customers/{customer_id}/addresses/{id}",
	 *      operationId="getCustomerAddress",
	 *      tags={"CustomerAddresses"},
	 *      summary="Get admin customer's address detail",
     *      description="Returns customer's address detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Address ID",
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
     *      )
	 * )
	 */
	public function get()
	{
	}

    /**
     * @OA\Post(
     *      path="/api/v1/admin/customers/{customer_id}/addresses",
     *      operationId="storeCustomerAddress",
     *      tags={"CustomerAddresses"},
     *      summary="Store the customer's address",
     *      description="Store the customer's address",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer Id",
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
     *                      description="Company name",
     *                      example="Bagisto"
     *                  ),
     *                  @OA\Property(
     *                      property="vat_id",
     *                      type="string",
     *                      description="Vat ID",
     *                      example="INV01234567891"
     *                  ),
     *                  @OA\Property(
     *                      property="first_name",
     *                      type="string",
     *                      description="Customer's First name",
     *                      example="John"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Customer's Last name",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="address1",
     *                      description="Street Address",
     *                      type="array",
     *                      example={
     *                          "5230, N Lincoln Ave"
     *                      },
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="address1",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(type="string")
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="Address's ountry code `United State` i.e. `US`",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="Address's state code `Indiana` i.e. `IN`",
     *                      example="IN"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      description="Address's city",
     *                      example="Chicago"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      description="Address's postcode",
     *                      type="integer",
     *                      example=60625
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      description="Phone Number",
     *                      type="string",
     *                      example="02345678976"
     *                  ),
     *                  @OA\Property(
     *                      property="default_address",
     *                      description="Default Address Status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  required={"first_name", "last_name", "address1", "country", "state", "city", "postcode", "phone"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Customer address created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Address")
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
     *      path="/api/v1/admin/customers/{customer_id}/addresses/{id}",
     *      operationId="updateCustomerAddress",
     *      tags={"CustomerAddresses"},
     *      summary="Update customer's addresses",
     *      description="Update customer's addresses",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Address ID",
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
     *                      description="Company name",
     *                      example="Bagisto"
     *                  ),
     *                  @OA\Property(
     *                      property="vat_id",
     *                      type="string",
     *                      description="Vat ID",
     *                      example="INV01234567891"
     *                  ),
     *                  @OA\Property(
     *                      property="first_name",
     *                      type="string",
     *                      description="Customer's First name",
     *                      example="John"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Customer's Last name",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="address1",
     *                      description="Street Address",
     *                      type="array",
     *                      example={
     *                          "5230, N Lincoln Ave"
     *                      },
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="address1",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(type="string")
     *                              )
     *                          )
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      type="string",
     *                      description="Address's ountry code `United State` i.e. `US`",
     *                      example="US"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      type="string",
     *                      description="Address's state code `Indiana` i.e. `IN`",
     *                      example="IN"
     *                  ),
     *                  @OA\Property(
     *                      property="city",
     *                      type="string",
     *                      description="Address's city",
     *                      example="Chicago"
     *                  ),
     *                  @OA\Property(
     *                      property="postcode",
     *                      description="Address's postcode",
     *                      type="integer",
     *                      example=60625
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      description="Phone Number",
     *                      type="string",
     *                      example="02345678976"
     *                  ),
     *                  @OA\Property(
     *                      property="default_address",
     *                      description="Default Address Status",
     *                      type="integer",
     *                      example=null,
     *                      enum={1}
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
     *                  example="Customer address updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Address"
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
     *      path="/api/v1/admin/customers/{customer_id}/addresses/{id}",
     *      operationId="deleteCustomerAddress",
     *      tags={"CustomerAddresses"},
     *      summary="Delete customer's address by id",
     *      description="Delete customer's address by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Group ID",
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
     *                  example="Customer address deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/customers/{customer_id}/addresses/mass-destroy",
     *      operationId="massDeleteCustomerAddress",
     *      tags={"CustomerAddresses"},
     *      summary="Mass delete customer's address' by id",
     *      description="Mass delete customer's address' by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="customer_id",
     *          description="Customer Id",
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
     *                      property="indexes",
     *                      description="Address's Ids `CommaSeperated`",
     *                      type="string",
     *                      example="8,7"
     *                  ),
     *                  required={"indexes"}
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
     *                  example="Selected customer addresses deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

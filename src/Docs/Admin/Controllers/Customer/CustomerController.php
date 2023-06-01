<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Customer;

class CustomerController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/customers",
	 *      operationId="getCustomers",
	 *      tags={"Customers"},
	 *      summary="Get admin customer list",
     *      description="Returns customer list, if you want to retrieve all customers at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
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
     *                  @OA\Items(ref="#/components/schemas/Customer")
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
	 *      path="/api/v1/admin/customers/{id}",
	 *      operationId="getCustomer",
	 *      tags={"Customers"},
	 *      summary="Get admin customer detail",
     *      description="Returns customer detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer ID",
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
     *                  ref="#/components/schemas/Customer"
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
     *      path="/api/v1/admin/customers",
     *      operationId="storeCustomer",
     *      tags={"Customers"},
     *      summary="Store the customer",
     *      description="Store the customer",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="first_name",
     *                      type="string",
     *                      description="Customer's first name",
     *                      example="Smith"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Customer's last name",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="Customer's email",
     *                      example="smith@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="gender",
     *                      type="string",
     *                      description="Customer's gender",
     *                      example="Male",
     *                      enum={"Male", "Female", "Other"}
     *                  ),
     *                  @OA\Property(
     *                      property="date_of_birth",
     *                      description="Customer's date of birth i.e. `yyyy-mm-dd`",
     *                      format="date",
     *                      type="string",
     *                      example="1990-12-05"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      description="Customer's phone",
     *                      type="integer",
     *                      example=9785461320
     *                  ),
     *                  @OA\Property(
     *                      property="customer_group_id",
     *                      description="Customer's group id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"first_name", "last_name", "email", "gender", "customer_group_id"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Customer created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Customer")
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
     *      path="/api/v1/admin/customers/{id}",
     *      operationId="updateCustomer",
     *      tags={"Customers"},
     *      summary="Update Customer",
     *      description="Update Customer",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
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
     *                      property="first_name",
     *                      type="string",
     *                      description="Customer's first name",
     *                      example="Smith"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      type="string",
     *                      description="Customer's last name",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="Customer's email",
     *                      example="smith@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="gender",
     *                      type="string",
     *                      description="Customer's gender",
     *                      example="Male",
     *                      enum={"Male", "Female", "Other"}
     *                  ),
     *                  @OA\Property(
     *                      property="date_of_birth",
     *                      description="Customer's date of birth i.e. `yyyy-mm-dd`",
     *                      format="date",
     *                      type="string",
     *                      example="1990-12-05"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      description="Customer's status",
     *                      type="integer",
     *                      example=1,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="is_suspended",
     *                      description="Customer's suspended status",
     *                      type="integer",
     *                      example=0,
     *                      enum={0, 1}
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      description="Customer's phone",
     *                      format="int64",
     *                      type="integer",
     *                      example=9785461320
     *                  ),
     *                  @OA\Property(
     *                      property="customer_group_id",
     *                      description="Customer's group id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  required={"first_name", "last_name", "email", "gender", "customer_group_id"}
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
     *                  example="Customer updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Customer"
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
     *      path="/api/v1/admin/customers/{id}",
     *      operationId="deleteCustomer",
     *      tags={"Customers"},
     *      summary="Delete customer by id",
     *      description="Delete customer by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
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
     *                  example="Customer deleted successfully."),
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
     *      path="/api/v1/admin/customers/mass-destroy",
     *      operationId="massDeleteCustomer",
     *      tags={"Customers"},
     *      summary="Mass delete customers",
     *      description="Mass delete customers",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="Customer's Ids `CommaSeperated`",
     *                      type="string",
     *                      example="1,2"
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
     *                  example="Selected customers successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }

	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/customers/{id}/orders",
	 *      operationId="getCustomerOrders",
	 *      tags={"Customers"},
	 *      summary="Get admin customer's order list",
     *      description="Returns customer's order list",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer ID",
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
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Order")
     *              )
     *          )
     *      )
	 * )
	 */
	public function orders()
	{
	}
    
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/customers/{id}/invoices",
	 *      operationId="getCustomerInvoices",
	 *      tags={"Customers"},
	 *      summary="Get admin order's invoice list by customer id",
     *      description="Get admin order's invoice list by customer id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer ID",
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
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Invoice")
     *              )
     *          )
     *      )
	 * )
	 */
	public function invoices()
	{
	}
    
	/**
	 * @OA\Post(
	 *      path="/api/v1/admin/customers/{id}/notes",
	 *      operationId="storeCustomerNote",
	 *      tags={"Customers"},
	 *      summary="Store the customer's note by customer id",
     *      description="Store the customer's note by customer id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="notes",
     *                      description="Customer's note",
     *                      type="string",
     *                      example="This is a first note for this customer"
     *                  ),
     *                  required={"notes"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Customer")
     *              )
     *          )
     *      )
	 * )
	 */
	public function storeNote()
	{
	}
}

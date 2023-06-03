<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Marketing;

class EmailTemplateController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/promotions/email-templates",
	 *      operationId="getEmailTemplates",
	 *      tags={"EmailTemplates"},
	 *      summary="Get admin email template list",
     *      description="Returns email template list, if you want to retrieve all email templates at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Email Template Id",
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
     *                  @OA\Items(ref="#/components/schemas/EmailTemplate")
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
	 *      path="/api/v1/admin/promotions/email-templates/{id}",
	 *      operationId="getEmailTemplate",
	 *      tags={"EmailTemplates"},
	 *      summary="Get admin email template detail",
     *      description="Returns email template detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Email Template ID",
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
     *                  ref="#/components/schemas/EmailTemplate"
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
     *      path="/api/v1/admin/promotions/email-templates",
     *      operationId="storeEmailTemplate",
     *      tags={"EmailTemplates"},
     *      summary="Store the email template",
     *      description="Store the email template",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Email template name",
     *                      example="Festival Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      type="string",
     *                      description="Email template content",
     *                      example="What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="string",
     *                      description="Email template status",
     *                      example="inactive",
     *                      enum={"active", "inactive", "draft"}
     *                  ),
     *                  required={"name", "content"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Email template created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/EmailTemplate")
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
     *      path="/api/v1/admin/promotions/email-templates/{id}",
     *      operationId="updateEmailTemplate",
     *      tags={"EmailTemplates"},
     *      summary="Update email template",
     *      description="Update email template",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Email Template ID",
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
     *                      description="Email template name",
     *                      example="Festival Offer"
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      type="string",
     *                      description="Email template content",
     *                      example="What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="string",
     *                      description="Email template status",
     *                      example="inactive",
     *                      enum={"active", "inactive", "draft"}
     *                  ),
     *                  required={"name", "content"}
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
     *                  example="Email template updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/EmailTemplate"
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
     *      path="/api/v1/admin/promotions/email-templates/{id}",
     *      operationId="deleteEmailTemplate",
     *      tags={"EmailTemplates"},
     *      summary="Delete email template by id",
     *      description="Delete email template by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Email Template ID",
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
     *                  example="Email template deleted successfully."),
     *              )
     *          )
     *      )
     * )
     */
    public function destroy()
    {
    }
}

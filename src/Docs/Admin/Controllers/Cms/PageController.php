<?php

namespace Webkul\RestApi\Docs\Admin\Controllers\Cms;

class PageController
{
	/**
	 * @OA\Get(
	 *      path="/api/v1/admin/cms",
	 *      operationId="getCmsPages",
	 *      tags={"Cms-Pages"},
	 *      summary="Get admin CMS page list",
     *      description="Returns CMS page list, if you want to retrieve all CMS pages at once pass pagination=0 otherwise ignore this parameter",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CMS Page id",
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
     *                  @OA\Items(ref="#/components/schemas/CmsPage")
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
	 *      path="/api/v1/admin/cms/{id}",
	 *      operationId="getCMSPage",
	 *      tags={"Cms-Pages"},
	 *      summary="Get admin CMS page detail",
     *      description="Returns CMS page detail",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CMS Page id",
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
     *                  ref="#/components/schemas/CmsPage"
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
     *      path="/api/v1/admin/cms",
     *      operationId="storeCMSPage",
     *      tags={"Cms-Pages"},
     *      summary="Store the CMS page",
     *      description="Store the CMS page",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="url_key",
     *                      type="string",
     *                      description="CMS page's Url Key (must be unique)",
     *                      example="faq-info"
     *                  ),
     *                  @OA\Property(
     *                      property="page_title",
     *                      type="string",
     *                      description="CMS page's title",
     *                      example="FAQ Information"
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="CMS page's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  @OA\Property(
     *                      property="html_content",
     *                      format="text",
     *                      type="string",
     *                      description="CMS page's html content",
     *                      example="<div class=\'static-container\'><div class=\'mb-5\'>FAQ page content information</div></div>"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_title",
     *                      type="string",
     *                      description="CMS page's meta title",
     *                      example="faq-info"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_keywords",
     *                      type="string",
     *                      description="CMS page's meta keywords",
     *                      example="faq-info"
     *                  ),
     *                  @OA\Property(
     *                      property="meta_description",
     *                      type="string",
     *                      description="CMS page's meta descripton",
     *                      example="faq-info"
     *                  ),
     *                  required={"url_key", "page_title", "channels", "html_content"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="CMS Page created successfully."),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/CmsPage")
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
     *      path="/api/v1/admin/cms/{id}",
     *      operationId="updateCMSPage",
     *      tags={"Cms-Pages"},
     *      summary="Update CMS page",
     *      description="Update CMS page",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CMS Page id",
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
     *                      description="Provide locale code as key to this index i.e. 'en'",
     *                      type="object",
     *                          @OA\Property(
     *                              property="url_key",
     *                              type="string",
     *                              description="CMS page's Url Key (must be unique)",
     *                              example="faq-info"
     *                          ),
     *                          @OA\Property(
     *                              property="page_title",
     *                              type="string",
     *                              description="CMS page's title",
     *                              example="FAQ Information"
     *                          ),
     *                          @OA\Property(
     *                              property="html_content",
     *                              format="text",
     *                              type="string",
     *                              description="CMS page's html content",
     *                              example="<div class=\'static-container\'><div class=\'mb-5\'>FAQ page content information</div></div>"
     *                          ),
     *                          @OA\Property(
     *                              property="meta_title",
     *                              type="string",
     *                              description="CMS page's meta title",
     *                              example="faq-info"
     *                          ),
     *                          @OA\Property(
     *                              property="meta_keywords",
     *                              type="string",
     *                              description="CMS page's meta keywords",
     *                              example="faq-info"
     *                          ),
     *                          @OA\Property(
     *                              property="meta_description",
     *                              type="string",
     *                              description="CMS page's meta descripton",
     *                              example="faq-info"
     *                          )
     *                  ),
     *                  @OA\Property(
     *                      property="channels",
     *                      description="CMS page's channels",
     *                      type="array",
     *                      @OA\Items(type="integer", example=1)
     *                  ),
     *                  required={"channels"}
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
     *                  example="CMS Page updated successfully."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/CmsPage"
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
     *      path="/api/v1/admin/cms/{id}",
     *      operationId="deleteCMSPage",
     *      tags={"Cms-Pages"},
     *      summary="Delete CMS page by id",
     *      description="Delete CMS page by id",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CMS Page id",
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
     *                  example="CMS Page deleted successfully."),
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
     *      path="/api/v1/admin/cms/mass-destroy",
     *      operationId="massDeleteCMSPage",
     *      tags={"Cms-Pages"},
     *      summary="Mass delete cms pages",
     *      description="Mass delete cms pages",
     *      security={ {"sanctum_admin": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
	 *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="indexes",
     *                      description="CMS Page's Ids `CommaSeperated`",
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
     *                  example="Selected CMS Page successfully deleted."),
     *              )
     *          )
     *      )
     * )
     */
    public function massDestroy()
    {
    }
}

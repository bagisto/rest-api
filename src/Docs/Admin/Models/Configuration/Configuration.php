<?php

namespace Webkul\RestApi\Docs\Admin\Models\Configuration;

/**
 * @OA\Schema(
 *     title="Configuration",
 *     description="Configuration model",
 * )
 */
class Configuration
{
    /**
     * @OA\Property(
     *     title="items",
     *     description="Configuration's fields object",
     *     type="object",
     *     example={
     *          "items": {
     *              "general": {
     *                  "key": "general",
     *                  "name": "admin::app.admin.system.general",
     *                  "sort": 1,
     *                  "children": {{
     *                      "content": {
     *                          "key": "general.footer",
     *                          "name": "admin::app.admin.system.footer",
     *                          "sort": 1,
     *                          "fields": {{
     *                              "name": "footer_content",
     *                              "title": "admin::app.admin.system.footer-content",
     *                              "type": "text",
     *                              "channel_based": true,
     *                              "locale_based": true
     *                          }}
     *                      }
     *                  }}
     *              },
     *              "catalog": {
     *                  "key": "catalog",
     *                  "name": "admin::app.admin.system.catalog",
     *                  "sort": 2,
     *                  "children": {
     *                      "products": {
     *                          "key": "catalog.products",
     *                          "name": "admin::app.admin.system.products",
     *                          "sort": 2,
     *                          "fields": {{
     *                              "name": "allow-guest-checkout",
     *                              "title": "admin::app.admin.system.allow-guest-checkout",
     *                              "type": "boolean"
     *                          }},
     *                          "children": {}
     *                      }
     *                  }
     *              },
     *              "customer": {
     *                  "key": "customer",
     *                  "name": "admin::app.admin.system.customer",
     *                  "sort": 3,
     *                  "children": {}
     *              }
     *          }
     *      },
     *      @OA\Property(
     *          property="items",
     *          type="object",
     *          @OA\Property(
     *              property="general",
     *              type="object",
     *              @OA\Property(property="key", type="string", example="general"),
     *              @OA\Property(property="name", type="string", example="admin::app.admin.system.catalog"),
     *              @OA\Property(property="sort", type="integer", example=1),
     *              @OA\Property(
     *                  property="children",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="content",
     *                          type="object",
     *                          @OA\Property(property="key", type="string", example="general.footer"),
     *                          @OA\Property(property="name", type="string", example="admin::app.admin.system.footer"),
     *                          @OA\Property(property="sort", type="integer", example=1), 
     *                          @OA\Property(
     *                              property="fields",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(property="name", type="string", example="footer_content"),
     *                                  @OA\Property(property="title", type="string", example="admin::app.admin.system.footer-content"),
     *                                  @OA\Property(property="type", type="string", example="text"),
     *                                  @OA\Property(property="channel_based", type="boolean", example=true, enum={true, false}),
     *                                  @OA\Property(property="locale_based", type="boolean", example=true, enum={true, false}),
     * 
     *                              )
     *                          )
     *                      )
     *                  )
     *              )
     *          ),
     *          @OA\Property(
     *              property="catalog",
     *              type="object",
     *              @OA\Property(property="key", type="string", example="catalog"),
     *              @OA\Property(property="name", type="string", example="admin::app.admin.system.general"),
     *              @OA\Property(property="sort", type="integer", example=1),
     *              @OA\Property(
     *                  property="children",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="products",
     *                          type="object",
     *                          @OA\Property(property="key", type="string", example="catalog.products"),
     *                          @OA\Property(property="name", type="string", example="admin::app.admin.system.products"),
     *                          @OA\Property(property="sort", type="integer", example=1), 
     *                          @OA\Property(
     *                              property="content",
     *                              type="array",
     *                              @OA\Items(
     *                                  @OA\Property(property="name", type="string", example="allow-guest-checkout"),
     *                                  @OA\Property(property="title", type="string", example="admin::app.admin.system.allow-guest-checkout"),
     *                                  @OA\Property(property="type", type="string", example="boolean", enum={"text", "textarea", "boolean", "select"})
     * 
     *                              )
     *                          )
     *                      )
     *                  )
     *              )
     *          )
     *      )
     * )
     *
     * @var object
     */
    private $items;

    /**
     * @OA\Property(
     *     title="roles",
     *     description="Configuration's fields object",
     *     type="object",
     *     example={}
     * )
     *
     * @var object
     */
    private $roles;
    
    /**
     * @OA\Property(
     *     title="current",
     *     description="Configuration's current URL",
     *     type="string",
     *     example="http://localhost/public/api/v1/admin/configuration"
     * )
     *
     * @var string
     */
    private $current;
    
    /**
     * @OA\Property(
     *     title="currentKey",
     *     description="Configuration's url params",
     *     type="string",
     *     example="general/general"
     * )
     *
     * @var string
     */
    private $currentKey;
}
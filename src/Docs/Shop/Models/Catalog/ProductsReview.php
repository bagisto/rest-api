<?php

namespace Webkul\RestApi\Docs\Shop\Models\Catalog;

/**
 * @OA\Schema(
 *     schema="ProductsReview",
 *     title="ProductsReview",
 *     description="ProductsReview model",
 *     type="object",
 * )
 */
class ProductsReview
{
    /**
     * @OA\Property(
     *     title="current_page",
     *     description="Current Page",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $current_page;

    /**
     *     @OA\Property(
     *         property="data",
     *         title="ProductsReview",
     *         description="ProductsReview Data",
     *         type="array",
     *         @OA\Items(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 title="ID",
     *                 description="ID",
     *                 type="integer",
     *                 format="int64",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 title="Name",
     *                 description="Customer Name",
     *                 type="string",
     *                 example="Peter Doe"
     *             ),
     *             @OA\Property(
     *                 property="title",
     *                 title="Title",
     *                 description="Review title",
     *                 type="string",
     *                 example="Good Product & Fast Service"
     *             ),
     *             @OA\Property(
     *                 property="rating",
     *                 title="Rating",
     *                 description="Review rating",
     *                 type="integer",
     *                 format="int64",
     *                 example=4,
     *                 enum={"5", "4", "3", "2", "1"}
     *             ),
     *             @OA\Property(
     *                 property="comment",
     *                 title="Comment",
     *                 description="Review comment",
     *                 type="string",
     *                 example="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
     *             ),
     *             @OA\Property(
     *                 property="status",
     *                 title="Status",
     *                 description="Review status",
     *                 type="string",
     *                 enum={"pending", "approved", "disapproved"}
     *             ),
     *             @OA\Property(
     *                 property="product_id",
     *                 title="Product ID",
     *                 description="Product ID",
     *                 type="integer",
     *                 format="int64",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="customer_id",
     *                 title="Customer ID",
     *                 description="Customer ID",
     *                 type="integer",
     *                 format="int64",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="created_at",
     *                 title="Created at",
     *                 description="Created at",
     *                 type="string",
     *                 format="datetime",
     *                 example="2020-01-27 17:50:45"
     *             ),
     *             @OA\Property(
     *                 property="updated_at",
     *                 title="Updated at",
     *                 description="Updated at",
     *                 type="string",
     *                 format="datetime",
     *                 example="2020-01-27 17:50:45"
     *             )
     *         )
     *     )
     *
     * @var array
     */
    private $data;

    /**
     * @OA\Property(
     *     title="First Page Url",
     *     description="First Page Url",
     *     example="http://localhost/public/api/v1/product/reviews?product_id=1&page=1"
     * )
     *
     * @var string
     */
    private $first_page_url;

    /**
     * @OA\Property(
     *     title="From",
     *     description="From",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $from;

    /**
     * @OA\Property(
     *     title="Last Page",
     *     description="Last Page",
     *     format="int64",
     *     example="3"
     * )
     *
     * @var string
     */
    private $last_page;

    /**
     * @OA\Property(
     *     title="Last Page Url",
     *     description="Last Page Url",
     *     example="http://localhost/public/api/v1/product/reviews?product_id=1&page=3"
     * )
     *
     * @var string
     */
    private $last_page_url;

    /**
     *     @OA\Property(
     *         property="links",
     *         title="Links",
     *         description="Links",
     *         type="array",
     *         @OA\Items(
     *             type="object",
     *             @OA\Property(
     *                 property="url",
     *                 type="string",
     *                 example=null
     *             ),
     *             @OA\Property(
     *                 property="label",
     *                 type="string",
     *                 example="Previous"
     *             ),
     *             @OA\Property(
     *                 property="active",
     *                 type="boolean",
     *                 example=false
     *             )
     *         ),
     *         example={
     *             {"url": null, "label": "Previous", "active": false},
     *             {"url": "http://localhost/public/api/v1/product/reviews?product_id=1&page=1", "label": "1", "active": true},
     *             {"url": "http://localhost/public/api/v1/product/reviews?product_id=1&page=2", "label": "2", "active": false},
     *             {"url": "http://localhost/public/api/v1/product/reviews?product_id=1&page=3", "label": "3", "active": false},
     *             {"url": "http://localhost/public/api/v1/product/reviews?product_id=1&page=2", "label": "Next", "active": false}
     *         }
     *     )
     *
     * @var array
     */
    private $links;

    /**
     * @OA\Property(
     *     title="Next Page Url",
     *     description="Next Page Url",
     *     example="http://localhost/public/api/v1/product/reviews?product_id=1&page=2"
     * )
     *
     * @var string
     */
    private $next_page_url;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Path",
     *     example="http://localhost/public/api/v1/product/reviews"
     * )
     *
     * @var string
     */
    private $path;

    /**
     * @OA\Property(
     *     title="Per Page",
     *     description="Per Page",
     *     format="int64",
     *     example="10"
     * )
     *
     * @var integer
     */
    private $per_page;

    /**
     * @OA\Property(
     *     title="Previous Page Url",
     *     description="Previous Page Url",
     *     format="int64",
     *     example="10"
     * )
     *
     * @var string
     */
    private $prev_page_url;

    /**
     * @OA\Property(
     *     title="To",
     *     description="To",
     *     format="int64",
     *     example="2"
     * )
     *
     * @var int
     */
    private $to;

    /**
     * @OA\Property(
     *     title="Total",
     *     description="Total",
     *     format="int64",
     *     example="5"
     * )
     *
     * @var int
     */
    private $total;
}

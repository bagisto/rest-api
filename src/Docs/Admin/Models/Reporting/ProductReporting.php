<?php

namespace Webkul\RestApi\Docs\Admin\Models\Reporting;

/**
 * @OA\Schema(
 *     title="ProductReporting",
 *     description="Product Reporting",
 * )
 */
class ProductReporting
{
    /**
     * @OA\Property(
     *     title="Statistics",
     *     description="Statistics of the product report",
     *     @OA\Property(
     *         property="quantities",
     *         description="Quantities statistics",
     *         type="object",
     *         @OA\Property(property="previous", type="integer", example=0),
     *         @OA\Property(property="current", type="integer", example=1),
     *         @OA\Property(property="progress", type="integer", example=100)
     *     ),
     *     @OA\Property(
     *         property="over_time",
     *         description="Statistics over time",
     *         type="object",
     *         @OA\Property(
     *             property="previous",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="label", type="string", example="18 Jan"),
     *                 @OA\Property(property="total", type="integer", example=0)
     *             )
     *         ),
     *         @OA\Property(
     *             property="current",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="label", type="string", example="17 Mar"),
     *                 @OA\Property(property="total", type="integer", example=0)
     *             )
     *         )
     *     )
     * )
     *
     * @var array
     */
    private $statistics;

    /**
     * @OA\Property(
     *     title="Date Range",
     *     description="Date range of the product report",
     *     @OA\Property(property="previous", type="string", example="18 Jan 2024 - 17 Feb 2024"),
     *     @OA\Property(property="current", type="string", example="17 Feb 2024 - 18 Mar 2024")
     * )
     *
     * @var array
     */
    private $date_range;
}

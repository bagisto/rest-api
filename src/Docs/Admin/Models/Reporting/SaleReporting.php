<?php

namespace Webkul\RestApi\Docs\Admin\Models\Reporting;

/**
 * @OA\Schema(
 *     title="SaleReporting",
 *     description="Sale Reporting",
 * )
 */
class SaleReporting
{
    /**
     * @OA\Property(
     *     title="Statistics",
     *     description="Statistics of the sales report",
     *     @OA\Property(
     *         property="sales",
     *         description="Sales statistics",
     *         type="object",
     *         @OA\Property(property="previous", type="integer", example=0),
     *         @OA\Property(property="current", type="integer", example=100),
     *         @OA\Property(property="formatted_total", type="string", example="$100.00"),
     *         @OA\Property(property="progress", type="integer", example=100)
     *     ),
     *     @OA\Property(
     *         property="over_time",
     *         description="Sales over time statistics",
     *         type="object",
     *         @OA\Property(
     *             property="previous",
     *             description="Sales statistics for previous period",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="label", type="string", example="18 Jan"),
     *                 @OA\Property(property="total", type="integer", example=0),
     *                 @OA\Property(property="count", type="integer", example=0)
     *             )
     *         ),
     *         @OA\Property(
     *             property="current",
     *             description="Sales statistics for current period",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="label", type="string", example="17 Feb"),
     *                 @OA\Property(property="total", type="integer", example=0),
     *                 @OA\Property(property="count", type="integer", example=0)
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
     *     description="Date range of the sales report",
     *     @OA\Property(property="previous", type="string", example="18 Jan 2024 - 17 Feb 2024"),
     *     @OA\Property(property="current", type="string", example="17 Feb 2024 - 18 Mar 2024")
     * )
     *
     * @var array
     */
    private $date_range;
}

<?php

namespace Webkul\RestApi\Docs\Admin\Models\Reporting;

/**
 * @OA\Schema(
 *     title="CustomerReporting",
 *     description="Customer Reporting",
 * )
 */
class CustomerReporting
{
    /**
     * @OA\Property(
     *     title="Statistics",
     *     description="Statistics of the customer report",
     *     @OA\Items(
     *         @OA\Property(property="id", type="integer", example=null),
     *         @OA\Property(property="email", type="string", example="admin@example.com"),
     *         @OA\Property(property="full_name", type="string", example="John Doe"),
     *         @OA\Property(property="total", type="string", example="100.0000"),
     *         @OA\Property(property="orders", type="integer", example=1),
     *         @OA\Property(property="progress", type="integer", example=100),
     *         @OA\Property(property="formatted_total", type="string", example="$100.00"),
     *         @OA\Property(property="datetime", type="string", example=null)
     *     )
     * )
     *
     * @var array
     */
    private $statistics;

    /**
     * @OA\Property(
     *     title="Date Range",
     *     description="Date range of the customer report",
     *     @OA\Property(property="previous", type="string", example="18 Jan 2024 - 17 Feb 2024"),
     *     @OA\Property(property="current", type="string", example="17 Feb 2024 - 18 Mar 2024")
     * )
     *
     * @var array
     */
    private $date_range;
}

<?php

namespace Webkul\RestApi\Docs\Shop\Models\Core;

/**
 * @OA\Schema(
 *     title="ConfigValue",
 *     description="ConfigValue model",
 * )
 */
class ConfigValue
{
    /**
     * @OA\Property(
     *     title="Value1",
     *     description="Core field code",
     *     format="string",
     *     example="value1"
     * )
     *
     * @var string
     */
    public $code1;
    /**
     * @OA\Property(
     *     title="Value2",
     *     description="Core field code",
     *     format="string",
     *     example="value2"
     * )
     *
     * @var string
     */
    public $code2;
}
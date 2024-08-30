<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Core;

class ThemeController
{
    /**
     * @OA\Get(
     *      path="/api/v1/theme/customizations",
     *      operationId="getThemeCustomizations",
     *      tags={"Themes"},
     *      summary="Get Theme Customizations Value",
     *      description="Get Theme Customizations",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *
     *                  @OA\Items(ref="#/components/schemas/Theme")
     *              ),
     *
     *              @OA\Property(
     *                  property="meta",
     *                  ref="#/components/schemas/Pagination"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function getThemeCustomizations()
    {
    }

    /**
     * @OA\Get(
     *      path="/api/v1/theme/customizations/{id}",
     *      operationId="repository",
     *      tags={"Themes"},
     *      summary="Get Theme Customizations Value By ID",
     *      description="Get Theme Customizations",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Theme id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(
     *
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Theme"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function repository()
    {
    }
}

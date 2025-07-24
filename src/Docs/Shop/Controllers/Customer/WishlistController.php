<?php

namespace Webkul\RestApi\Docs\Shop\Controllers\Customer;

class WishlistController
{
    /**
     * @OA\Get(
     *      path="/api/v1/customer/wishlist",
     *      operationId="getCustomerWishlistDetail",
     *      tags={"Wishlists"},
     *      summary="Get customer's wishlist",
     *      description="Returns customer's wishlist",
     *      security={ {"sanctum": {} }},
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
     *                  ref="#/components/schemas/Wishlist"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function get()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/wishlist/{id}",
     *      operationId="createOrRemoveCustomerWishlist",
     *      tags={"Wishlists"},
     *      summary="Add or Remove product to customer's wishlist",
     *      description="Add or Remove product to customer's wishlist",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *                  property="message",
     *                  type="string",
     *                  example="Product added/removed to wishlist successfully."
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Post(
     *      path="/api/v1/customer/wishlist/{id}/move-to-cart",
     *      operationId="moveToCartCustomerWishlist",
     *      tags={"Wishlists"},
     *      summary="Move Product From Wishlist To Cart",
     *      description="The quantity field is used to specify the number of items to add or update in the cart. If omitted, a default quantity of 1 will be assumed.",
     *      security={ {"sanctum": {} }},
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="quantity",
     *          description="Product quantity",
     *          required=false,
     *          in="query",
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
     *                  property="message",
     *                  type="string",
     *                  example="Item successfully moved To cart."),
     *              @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/Wishlist"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Selected Wishlist product not found.."
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Something went wrong!"
     *      )
     * )
     */
    public function moveToCart()
    {
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/customer/wishlist/all",
     *      operationId="deleteAllWishlistItems",
     *      tags={"Wishlists"},
     *      summary="Delete all wishlist items.",
     *      description="Delete all wishlists items to the customer.",
     *      security={ {"sanctum": {} }},
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
     *                  ref="#/components/schemas/Wishlist"
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function deleteAll()
    {
    }
}

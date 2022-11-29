<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\RestApi\Http\Resources\V1\Shop\Sales\OrderTransactionResource;
use Webkul\Sales\Repositories\OrderTransactionRepository;

class TransactionController extends CustomerController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return OrderTransactionRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return OrderTransactionResource::class;
    }

    /**
     * Returns a listing of the order transactions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allResources(Request $request)
    {
        $query = $this->getRepositoryInstance()->scopeQuery(function ($query) use ($request) {
            $query = $query
                ->leftJoin('orders', 'order_transactions.order_id', '=', 'orders.id')
                ->select('order_transactions.*', 'orders.customer_id')
                ->where('customer_id', $this->resolveShopUser($request)->id);

            foreach ($request->except(['page', 'limit', 'pagination', 'sort', 'order', 'token']) as $input => $value) {
                $query = $query->whereIn($input, array_map('trim', explode(',', $value)));
            }

            if ($sort = $request->input('sort')) {
                $query = $query->orderBy($sort, $request->input('order') ?? 'desc');
            } else {
                $query = $query->orderBy('id', 'desc');
            }

            return $query;
        });

        if (is_null($request->input('pagination')) || $request->input('pagination')) {
            $results = $query->paginate($request->input('limit') ?? 10);
        } else {
            $results = $query->get();
        }

        return $this->getResourceCollection($results);
    }

    /**
     * Returns an individual invoice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResource(Request $request, int $id)
    {
        $resourceClassName = $this->resource();

        $query = $this->getRepositoryInstance()->leftJoin('orders', 'order_transactions.order_id', '=', 'orders.id')
            ->select('order_transactions.*', 'orders.customer_id')
            ->where('customer_id', $this->resolveShopUser($request)->id)
            ->findOrFail($id);

        return new $resourceClassName($query);
    }
}

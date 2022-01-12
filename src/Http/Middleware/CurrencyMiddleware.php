<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;
use Webkul\Core\Repositories\CurrencyRepository;

class CurrencyMiddleware
{
    /**
     * Currency repository.
     *
     * @var \Webkul\Core\Repositories\CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * Create a middleware instance.
     *
     * @param  \Webkul\Core\Repositories\CurrencyRepository $locale
     * @return void
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currencyCode = $request->header('x-currency');

        if ($currencyCode && $this->currencyRepository->findOneByField('code', $currencyCode)) {
            /**
             * For now adding session here till implementation of some tweaking currency.
             */
            session()->put('currency', $currencyCode);

            return $next($request);
        }

        /**
         * For now adding session here till implementation of some tweaking currency.
         */
        session()->put('currency', core()->getChannelBaseCurrencyCode());

        return $next($request);
    }
}

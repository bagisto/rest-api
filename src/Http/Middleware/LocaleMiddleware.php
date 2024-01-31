<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Webkul\Core\Repositories\LocaleRepository;

class LocaleMiddleware
{
    /**
     * Locale repository.
     *
     * @var \Webkul\Core\Repositories\LocaleRepository
     */
    protected $localeRepository;

    /**
     * Create a middleware instance.
     *
     * @return void
     */
    public function __construct(LocaleRepository $localeRepository)
    {
        $this->localeRepository = $localeRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localeCode = $request->header('x-locale');

        if ($localeCode && $this->localeRepository->findOneByField('code', $localeCode)) {
            app()->setLocale($localeCode);

            return $next($request);
        }

        app()->setLocale(core()->getDefaultChannel()->default_locale->code);

        return $next($request);
    }
}

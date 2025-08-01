<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ETagMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() !== 'GET') {
            return $next($request);
        }

        $response = $next($request);

        if (
            ! $response instanceof Response
            || ! str_contains($response->headers->get('Content-Type', ''), 'application/json')
        ) {
            return $response;
        }

        $etag = md5($response->getContent());

        $response->setEtag($etag);

        /**
         * Check if client has cached version.
         */
        if ($response->isNotModified($request)) {
            return $response;
        }

        return $response;
    }
}

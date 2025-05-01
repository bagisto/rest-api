<?php

namespace Webkul\RestApi\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Webkul\Core\Exceptions\Handler as BaseHandler;

class Handler extends BaseHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        if (config('app.debug')) {
            return;
        }

        $this->handleAuthenticationException();

        $this->handleHttpException();

        $this->handleValidationException();

        $this->handleServerException();
    }

    /**
     * Handle the authentication exception.
     */
    protected function handleAuthenticationException(): void
    {
        $this->renderable(function (AuthenticationException $exception, Request $request) {
            $nameSpace = $request->is(config('app.admin_url').'/*') ? 'admin' : 'shop';

            if ($request->wantsJson()) {
                return response()->json([
                    'error' => trans("rest-api::app.{$nameSpace}.errors.401.message")
                ], 401);
            }

            if ($nameSpace !== 'admin') {
                return redirect()->guest(route('shop.customer.session.index'));
            }

            return redirect()->guest(route('admin.session.create'));
        });
    }

    /**
     * Handle the http exceptions.
     */
    protected function handleHttpException(): void
    {
        $this->renderable(function (HttpException $exception, Request $request) {
            $nameSpace = $request->is(config('app.admin_url').'/*') ? 'admin' : 'shop';

            $errorCode = in_array($exception->getStatusCode(), [401, 403, 404, 503])
                ? $exception->getStatusCode()
                : 500;

            if ($request->wantsJson()) {
                return response()->json([
                    'title'   => trans("rest-api::app.{$nameSpace}.errors.{$errorCode}.title"),
                    'message' => trans("rest-api::app.{$nameSpace}.errors.{$errorCode}.message"),
                ], $errorCode);
            }

            return response()->view("{$nameSpace}::errors.index", compact('errorCode'));
        });
    }

    /**
     * Handle the server exceptions.
     */
    protected function handleServerException(): void
    {
        $this->renderable(function (Throwable $throwable, Request $request) {
            $nameSpace = $request->is(config('app.admin_url').'/*') ? 'admin' : 'shop';

            $errorCode = 500;

            if ($request->wantsJson()) {
                return response()->json([
                    'error' => trans("rest-api::app.{$nameSpace}.errors.message")
                ], $errorCode);
            }

            return response()->view("{$nameSpace}::errors.index", compact('errorCode'));
        });
    }

    /**
     * Handle validation exceptions.
     */
    protected function handleValidationException(): void
    {
        $this->renderable(function (ValidationException $exception, Request $request) {
            return parent::convertValidationExceptionToResponse($exception, $request);
        });
    }
}

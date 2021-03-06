<?php

namespace App\Exceptions;

use Exception;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      if ($request->expectsJson()) {
          if ($exception instanceof NotFoundHttpException) {
              return mainResponse(false, '404 Not Found.', [], 404,'error');
          }
          if ($exception instanceof ServerException) {
              return mainResponse(false, $exception->getMessage(), [], 500,'error');
          }

          if ($exception instanceof ModelNotFoundException) {
              return mainResponse(false, '404 Not Found', [], 404,'error');
          }
      }
            return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return mainResponse(false, 'لم يتم تسجيل الدخول', 'Unauthenticated.', 401,'error');
        }

        if (in_array('admin', explode('/', request()->url()))) {
            return redirect('/admin/login');
        } else {
            return redirect('/login');
        }
    }
}

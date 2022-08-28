<?php

namespace App\Exceptions;

use Exception;
use App\Http\Transformers\ResponseTransformer;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->acceptsJson()) {
                return (new ResponseTransformer)->json(404, $e->getMessage());
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->acceptsJson()) {
                return (new ResponseTransformer)->json(401, $e->getMessage());
            }
        });

        $this->renderable(function (ValidationException $e, $request) {
            if ($request->acceptsJson()) {
                return (new ResponseTransformer)->json(422, $e->getMessage(), $e->errors());
            }
        });

        $this->renderable(function (Exception $e, $request) {
            if ($request->acceptsJson()) {
                return (new ResponseTransformer)->json(400, $e->getMessage());
            }
        });
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
            // проверяем, что исключение является типом ошибки валидации
            if($exception instanceof ValidationException) {
                return new JsonResponse([
                    'success' => false,
                    'errors' => \Illuminate\Support\Arr::collapse($exception->errors()),
                    'message' => $exception->getMessage()
                ], 422);
            }

            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage()
            ], 422);
    }
}

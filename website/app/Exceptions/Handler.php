<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
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
    public function report(Exception|Throwable $e): void
    {
        parent::report($e);
    }


    public function render($request, Exception|Throwable $e)
    {
        return parent::render($request, $e);
    }

    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse|Response|RedirectResponse
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        $guard = Arr::get($exception->guards(),0);
        if ($guard == "admin")
            return redirect()->route('admin.login.form');
        return redirect()->guest(route('login'));
    }
}

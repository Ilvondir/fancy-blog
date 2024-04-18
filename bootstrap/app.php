<?php

use App\Http\Middleware\RedirectIf403;
use App\Http\Middleware\RedirectIf404;
use App\Http\Middleware\ShareArticlesToFooter;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ShareArticlesToFooter::class);
        $middleware->append(RedirectIf403::class);
        $middleware->append(RedirectIf404::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
<?php

use App\Http\Middleware\Authenticated;
use App\Http\Middleware\LogVisitor;
use App\Models\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'visitors' => LogVisitor::class,
            'admin' => Authenticated::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            'http://example.com/foo/bar',
            'http://example.com/foo/*',
            '/callback'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {})->create();

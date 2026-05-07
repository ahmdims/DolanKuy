<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'auth' => \App\Http\Middleware\AuthMiddleware::class,
            'auth.admin' => \App\Http\Middleware\AuthAdminMiddleware::class,
            'auth.admin.destination' => \App\Http\Middleware\AuthAdminDestinationMiddleware::class,
            'auth.admin.msme' => \App\Http\Middleware\AuthAdminMsmeMiddleware::class,
            'auth.admin.culture' => \App\Http\Middleware\AuthAdminCultureMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })
    ->create();
    $app->useStoragePath('/tmp/storage');
    return $app;
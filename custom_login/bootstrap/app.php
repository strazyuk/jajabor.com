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
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// Create /tmp/storage symlink for Vercel serverless environment.
// Uses getenv() instead of $app->environment() to avoid calling
// the container before it is fully booted (which causes ReflectionException on 'env').
if (getenv('APP_ENV') === 'production') {
    $basePath = dirname(__DIR__);
    $tmpStorage = '/tmp/storage';
    $link = $basePath . '/public/storage';

    if (!is_dir($tmpStorage)) {
        mkdir($tmpStorage, 0755, true);
    }
    if (!file_exists($link) && !is_link($link)) {
        symlink($tmpStorage, $link);
    }
}

return $app;

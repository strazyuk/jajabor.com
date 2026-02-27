<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// -----------------------------------------------------------------------
// Vercel serverless: the repo filesystem is read-only.
// We must aggressively redirect storage/ and bootstrap/cache to /tmp 
// BEFORE Laravel configures itself.
// $_ENV['APP_ENV'] is set by Vercel environment variables.
// -----------------------------------------------------------------------
if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'production') {
    $dirs = [
        '/tmp/storage/app/public',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
        '/tmp/bootstrap/cache',
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

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

// Force Laravel to use the writable /tmp paths 
if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'production') {
    $app->useStoragePath('/tmp/storage');
    $app->useBootstrapPath('/tmp/bootstrap');
}

return $app;

<?php

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
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// Ensure storage path is in /tmp on Vercel serverless environment
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL']) || getenv('VERCEL') || isset($_ENV['APP_STORAGE']) || getenv('APP_STORAGE')) {
    $storagePath = $_ENV['APP_STORAGE'] ?? getenv('APP_STORAGE') ?: '/tmp/storage';
    $app->useStoragePath($storagePath);
}

return $app;

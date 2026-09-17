<?php
require __DIR__ . '/../vendor/autoload.php';

// 1. Paksa injeksi Environment Variables (Mengatasi Manager::createDriver() error)
$envs = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true', // Kita hidupkan debug agar error-nya lebih jelas
    'LOG_CHANNEL' => 'stderr',
    'CACHE_STORE' => 'array', 
    'CACHE_DRIVER' => 'array', // Tambahan untuk kompatibilitas
    'SESSION_DRIVER' => 'cookie',
    'QUEUE_CONNECTION' => 'sync',
];

foreach ($envs as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

if (!getenv('APP_KEY')) {
    $appKey = 'base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=';
    putenv("APP_KEY=$appKey");
    $_ENV['APP_KEY'] = $appKey;
    $_SERVER['APP_KEY'] = $appKey;
}

// 2. Siapkan direktori penyimpanan dinamis di /tmp
$tmpStorage = '/tmp/storage';
$directories = [
    $tmpStorage . '/app',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/testing',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}
if (!file_exists($tmpStorage . '/logs/laravel.log')) {
    @touch($tmpStorage . '/logs/laravel.log');
}

// 3. Setup Database SQLite ke /tmp
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (file_exists($sourceDb) && !file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    touch($targetDb);
}

putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=/tmp/database.sqlite');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';

// 4. Load inti aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Paksa Laravel menggunakan /tmp
$app->useStoragePath($tmpStorage);

// 6. Jalankan Request
$app->handleRequest(Illuminate\Http\Request::capture());
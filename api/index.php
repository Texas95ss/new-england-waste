<?php
require __DIR__ . '/../vendor/autoload.php';

// 1. Siapkan direktori penyimpanan dinamis di /tmp
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

// 2. Setup Database SQLite ke /tmp
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (file_exists($sourceDb) && !file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    touch($targetDb);
}
putenv('DB_DATABASE=/tmp/database.sqlite');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';

// 3. Fallback APP_KEY (Opsional, lebih aman jika ditaruh di Dashboard Vercel)
if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=');
    $_ENV['APP_KEY'] = 'base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=';
}

// 4. Load inti aplikasi Laravel (Bukan public/index.php)
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Paksa Laravel 11 menggunakan /tmp sebagai folder utama storage
$app->useStoragePath($tmpStorage);

// 6. Jalankan Request
$app->handleRequest(Illuminate\Http\Request::capture());
<?php
// 1. Buat file .env virtual di /tmp (Pasti terbaca oleh Laravel)
$envContent = "
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=
APP_DEBUG=true
LOG_CHANNEL=stderr
DB_CONNECTION=sqlite
DB_DATABASE=/tmp/database.sqlite
SESSION_DRIVER=cookie
CACHE_STORE=array
CACHE_DRIVER=array
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
VIEW_COMPILED_PATH=/tmp/storage/framework/views
";
file_put_contents('/tmp/.env', trim($envContent));

require __DIR__ . '/../vendor/autoload.php';

// 2. Siapkan direktori penyimpanan di /tmp
$tmpStorage = '/tmp/storage';
$directories = [
    $tmpStorage . '/app',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/testing',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
    '/tmp/bootstrap/cache'
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}

if (!file_exists($tmpStorage . '/logs/laravel.log')) {
    @touch($tmpStorage . '/logs/laravel.log');
}

// 3. Setup SQLite
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (file_exists($sourceDb) && !file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    touch($targetDb);
}

// 4. Load aplikasi
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 5. Beritahu Laravel untuk membaca .env dan storage dari /tmp
$app->useEnvironmentPath('/tmp');
$app->useStoragePath($tmpStorage);
$app->useBootstrapPath('/tmp/bootstrap');

// 6. Jalankan request
$app->handleRequest(Illuminate\Http\Request::capture());
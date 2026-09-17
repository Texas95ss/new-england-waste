<?php

// 1. Siapkan direktori penyimpanan dinamis di /tmp (karena filesystem Vercel read-only)
$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

if (!file_exists('/tmp/storage/logs/laravel.log')) {
    @touch('/tmp/storage/logs/laravel.log');
}

// 2. Copy database SQLite awal ke /tmp jika belum ada
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (file_exists($sourceDb) && !file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    touch($targetDb);
}

// 3. Set environment override untuk folder yang wajib writable
if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=');
    $_ENV['APP_KEY'] = 'base64:xthK6QsPEOHY21YFDOiOqMj0fPCig77zrmfrYuS5zCU=';
}

putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');

putenv('DB_DATABASE=/tmp/database.sqlite');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';

putenv('APP_TIMEZONE=UTC');
$_ENV['APP_TIMEZONE'] = 'UTC';
date_default_timezone_set('UTC');

// 4. Panggil file public/index.php bawaan Laravel
require __DIR__ . '/../public/index.php';

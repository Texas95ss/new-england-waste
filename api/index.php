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
        mkdir($dir, 0755, true);
    }
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
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');
putenv('DB_DATABASE=/tmp/database.sqlite');
putenv('APP_TIMEZONE=UTC');
date_default_timezone_set('UTC');

// 4. Panggil file public/index.php bawaan Laravel
require __DIR__ . '/../public/index.php';

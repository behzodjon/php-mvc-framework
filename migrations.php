<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';
//dirname() doesn't need because it's in the same directory with .env
$dotenv = Dotenv\Dotenv::createImmutable((__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];
$app = new Application(__DIR__, $config);


$app->db->applyMigrations();

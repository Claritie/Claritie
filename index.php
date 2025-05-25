<?php

use App\Core\Bootstrap;
use App\Core\Dispatcher;

require_once __DIR__ . '/Packages/autoload.php';

session_start();
Bootstrap::init();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
//$uri = $_GET['route'] ?? '';

Dispatcher::handle($method, $requestUri);

<?php

use App\Core\Bootstrap;
use App\Core\Dispatcher;

require_once __DIR__ . '/Packages/autoload.php';

Bootstrap::init();

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_GET['route'] ?? '';

Dispatcher::handle($method, $uri);

<?php

namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Bootstrap
{
    public static $twig;
    private const VIEW_DIRECTORY = '/../Views';

    public static function init()
    {
        require_once __DIR__ . '/Autoloader.php';
        $loader = new FilesystemLoader(__DIR__ . self::VIEW_DIRECTORY);
        self::$twig = new Environment($loader);
    }
}

<?php

namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Bootstrap
{
    public static Environment $twig;
    private const VIEW_DIRECTORY = '/../Views';

    public static function init()
    {
        require_once __DIR__ . '/Autoloader.php';

        $twigLoader = new FilesystemLoader(__DIR__ . self::VIEW_DIRECTORY);
        $twigOptionSet = [
            'cache' => '/path/to/compilation_cache',
        ];

        self::$twig = new Environment($twigLoader);
    }
}

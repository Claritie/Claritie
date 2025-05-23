<?php

namespace App\Core;

use Yosymfony\Toml\Toml;

class Config
{
    private static $config;

    public static function load($path)
    {
        if (!self::$config) {
            self::$config = Toml::parseFile($path);
        }
        return self::$config;
    }

    public static function get($key, $default = null)
    {
        return self::$config[$key] ?? $default;
    }
}

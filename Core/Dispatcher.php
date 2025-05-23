<?php
namespace App\Core;

class Dispatcher
{
    // @TODO reduce this function into private methods
    public static function handle($method, $uri)
    {
        $parts = explode('/', trim($uri, '/'));

        if (count($parts) < 2)
        {
            require_once 'Middleware/PostProcessing/Errors/InvalidRoute.php';

            return; // false
        }

        ###

        $eventPath      = "Events/" . implode('/', array_slice($parts, 0, -1));
        $eventClassName = ucfirst(end($parts));
        $fullPath       = __DIR__ . "/../$eventPath/$eventClassName.php";

        if (!file_exists($fullPath))
        {
            var_dump($fullPath);
            require_once 'Middleware/PostProcessing/Errors/NotFound.php';

            return;
        }

        ###

        require_once $fullPath;

        $fqcn = "App\\$eventPath\\$eventClassName";

        if (!class_exists($fqcn))
        {
            http_response_code(500);
            echo "Class $fqcn not found.";

            return;
        }

        ###

        $instance = new $fqcn();

        if (!method_exists($instance, strtolower($method)))
        {
            http_response_code(405);
            echo "Method not allowed.";

            return;
        }

        ###

        call_user_func_array([$instance, strtolower($method)], array_slice($parts, 2));
    }
}

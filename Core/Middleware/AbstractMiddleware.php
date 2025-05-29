<?php

namespace App\Core\Middleware;

trait AbstractMiddleware
{
    private function scanDirectory(string $directory, string $namespace, array $middlewareList = []): array
    {
        $directoryToScan   = getcwd().$directory;
        $scanDirectoryList = scandir($directoryToScan, SCANDIR_SORT_DESCENDING);

        foreach ($scanDirectoryList as $file)
        {
            if (!static::isDotNotationFile($file) && static::isPhpFile($file))
            {
                $middlewareList[] = $namespace.substr($file, 0, -4);
            }
        }

        return $middlewareList;
    }

    private static function isDotNotationFile(string $filename): bool
    {
        return (substr($filename, 0, 1) === '.');
    }

    private static function isPhpFile(string $filename): bool
    {
        return (substr(strtoupper($filename), -4) === '.PHP');
    }
}

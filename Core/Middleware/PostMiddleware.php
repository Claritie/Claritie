<?php

namespace App\Core\Middleware;

trait PostMiddleware
{
    use AbstractMiddleware;

    public function postMiddleware(): array
    {
        // @TODO recursive folders need to be tested (eg LoggerMiddleware + LoggerMiddleware)
        return $this->scanDirectory('/Middleware/PostProcessing', 'App\Middleware\PostProcessing\\');
    }
}

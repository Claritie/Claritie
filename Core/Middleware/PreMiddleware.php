<?php

namespace App\Core\Middleware;

trait PreMiddleware
{
    use AbstractMiddleware;

    public function preMiddleware(): array
    {
        return $this->scanDirectory('/Middleware/PreProcessing', 'App\Middleware\PreProcessing\\');
    }
}

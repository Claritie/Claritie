<?php

namespace App\Core\EventInterface;

interface iHandle
{
    public function handle(mixed ...$parameters): void;
}

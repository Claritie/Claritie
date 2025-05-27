<?php

namespace App\Core\EventInterface;

interface iPost
{
    public function post(mixed ...$parameters): void;
}
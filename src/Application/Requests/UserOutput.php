<?php

namespace Maruko\DesignPatterns\Application\Requests;

class UserOutput
{
    public function __construct(
        public readonly string $name,
        public readonly string $token,
    )
    {}
}
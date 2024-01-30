<?php

namespace Maruko\DesignPatterns\Application\Requests;

class UserInput
{
    public function __construct(
        public readonly ?string $name,
        public readonly string  $email,
        public readonly string  $password,
        public readonly ?int    $age,
    )
    {
    }

    public function __get(string $name): ?string
    {
        return $this->$name;
    }
}
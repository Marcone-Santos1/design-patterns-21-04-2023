<?php

namespace Maruko\DesignPatterns\Application\Requests;

class UserInput
{
    public function __construct(
        private readonly ?string $name,
        private readonly string  $email,
        private readonly string  $password,
        private readonly ?int    $age,
    )
    {
    }

    public function __get(string $name): ?string
    {
        return $this->$name;
    }
}
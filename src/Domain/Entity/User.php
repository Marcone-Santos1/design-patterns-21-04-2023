<?php

namespace Maruko\DesignPatterns\Domain\Entity;

class User
{
    public function __construct(
        private readonly ?string $name,
        private readonly string $email,
        private readonly string $password,
        private readonly ?int $age,
    )
    {}

    public function __get(string $name)
    {
        return $this->$name;
    }
}
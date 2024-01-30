<?php

namespace Maruko\DesignPatterns\Domain\Entity;

use InvalidArgumentException;

class User
{
    public function __construct(
        public readonly ?string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly ?int $age,
    )
    {
        $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

        if (count(explode(" ", $this->name)) < 2) throw new InvalidArgumentException("Invalid name");
        if (!preg_match($pattern, strtolower($this->email))) throw new InvalidArgumentException('Invalid e-mail');
        if (strlen($this->password) < 8) throw new InvalidArgumentException('Invalid password');
        if ($this->age < 18) throw new InvalidArgumentException('Invalid age');

    }

    public function __get(string $name)
    {
        return $this->$name;
    }
}
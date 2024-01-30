<?php

namespace Maruko\DesignPatterns\Application\Requests;

class UserInput
{
    public function __construct(
        private readonly array $data,
    )
    {}

    public function __get(string $name): ?string
    {
        return $this->data[$name];
    }
}
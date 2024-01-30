<?php

namespace Maruko\DesignPatterns\Application\UseCase;

use Maruko\DesignPatterns\Application\Repository\UserRepository;
use Maruko\DesignPatterns\Application\Requests\UserInput;
use Maruko\DesignPatterns\Application\Requests\UserOutput;
use Maruko\DesignPatterns\Domain\Entity\User;

class Login
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {}

    public function execute(UserInput $loginInput): UserOutput
    {
        $user = new User(
            $loginInput->name,
            $loginInput->email,
            $loginInput->password,
            $loginInput->age
        );

        return new UserOutput(
            $user->name,
            md5('token'),
        );
    }
}
<?php

namespace Maruko\DesignPatterns\Application\UseCase;

use Maruko\DesignPatterns\Application\Repository\UserRepository;
use Maruko\DesignPatterns\Application\Requests\UserInput;
use Maruko\DesignPatterns\Domain\Entity\User;

class Signup
{
    public function __construct(
        readonly UserRepository $userRepository
    )
    {}

    public function execute(UserInput $input): void
    {
        $user = new User(
            $input->name,
            $input->email,
            $input->password,
            $input->age
        );

        $this->userRepository->save($user);
    }
}
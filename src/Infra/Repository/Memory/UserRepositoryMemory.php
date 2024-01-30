<?php

namespace Maruko\DesignPatterns\Infra\Repository\Memory;

use Maruko\DesignPatterns\Application\Repository\UserRepository as UserRepositoryInterface;
use Maruko\DesignPatterns\Domain\Entity\User;

class UserRepositoryMemory implements UserRepositoryInterface
{

    private array $users = [];

    public function __construct()
    {
    }

    public function save(User $user)
    {
        $this->users[] = $user;
    }

    public function getByEmail(string $email)
    {
        return array_filter($this->users, function ($userEmail) use ($email) {
            return $email === $userEmail;
        });
    }
}
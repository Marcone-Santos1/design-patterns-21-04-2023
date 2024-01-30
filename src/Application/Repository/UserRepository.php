<?php

namespace Maruko\DesignPatterns\Application\Repository;

use Maruko\DesignPatterns\Domain\Entity\User;

interface UserRepository
{
    public function save(User $user);

    public function getByEmail(string $email);
}
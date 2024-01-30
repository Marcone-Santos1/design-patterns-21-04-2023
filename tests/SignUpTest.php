<?php

use JetBrains\PhpStorm\NoReturn;
use Maruko\DesignPatterns\Application\UseCase\Login;
use Maruko\DesignPatterns\Application\UseCase\Signup;
use Maruko\DesignPatterns\Infra\Repository\Memory\UserRepositoryMemory;
use Maruko\DesignPatterns\Application\Requests\UserInput;
use PHPUnit\Framework\TestCase;

class SignUpTest extends TestCase
{
    #[NoReturn]
    public function testShouldDoTheSignup()
    {

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput([
            "name" => "Jonh Doe",
            "email" => "jonh.doe@gmail.com",
            "password" => "12345678",
            "age" => 30
        ]);

        // when

        $signup->execute($inputUser);

        // then
        $login = new Login($userRepository);

        $output = $login->execute($inputUser);

        $this->assertEquals($output->name, "Jonh Doe");
        $this->assertObjectHasProperty("token", $output);
    }
}
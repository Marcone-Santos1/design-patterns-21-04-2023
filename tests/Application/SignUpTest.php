<?php

use JetBrains\PhpStorm\NoReturn;
use Maruko\DesignPatterns\Application\Requests\UserInput;
use Maruko\DesignPatterns\Application\UseCase\Login;
use Maruko\DesignPatterns\Application\UseCase\Signup;
use Maruko\DesignPatterns\Infra\Repository\Memory\UserRepositoryMemory;
use PHPUnit\Framework\TestCase;

class SignUpTest extends TestCase
{
    #[NoReturn]
    public function testShouldDoTheSignup()
    {

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput(
            "Jonh Doe",
            "jonh.doe@gmail.com",
            "12345678",
            30
        );

        // when

        $signup->execute($inputUser);

        // then
        $login = new Login($userRepository);

        $output = $login->execute($inputUser);

        $this->assertEquals($output->name, "Jonh Doe");
        $this->assertObjectHasProperty("token", $output);
    }

    public function testShouldNotSignupIfNameIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid name');

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput(
            "Jonh",
            "jonh.doe@gmail.com",
            "12345678",
            30
        );

        // when
        $signup->execute($inputUser);
    }

    public function testShouldNotSignupIfEmailIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid e-mail');

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput(
            "Jonh Doe",
            "jonh.doegmail.com",
            "12345678",
            30
        );

        // when
        $signup->execute($inputUser);
    }

    public function testShouldNotSignupIfPasswordIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid password');

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput(
            "Jonh Doe",
            "jonh.doe@gmail.com",
            "1234567",
            30
        );

        // when
        $signup->execute($inputUser);
    }

    public function testShouldNotSignupIfAgeIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid age');

        $userRepository = new UserRepositoryMemory();

        // given
        $signup = new Signup($userRepository);

        $inputUser = new UserInput(
            "Jonh Doe",
            "jonh.doe@gmail.com",
            "12345678",
            17
        );

        // when
        $signup->execute($inputUser);
    }
}
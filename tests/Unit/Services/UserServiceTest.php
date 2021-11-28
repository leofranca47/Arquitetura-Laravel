<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_users_service()
    {
        $data = [
            'name' => 'leo',
            'email' => 'leo@email.com'
        ];

        $usersRepository = $this->createMock(UserRepository::class);
        $usersRepository->method('getAll')->willReturn($data);

        $userService = new UserService($usersRepository);
        $response = $userService->getUsers();
        $this->assertEquals($data, $response);
    }

    public function test_get_user_service()
    {
        $data = [
            "name" => "leo",
            "email" => "leo@email.com"
        ];

        $usersRepository = $this->createMock(UserRepository::class);
        $usersRepository->method('find')->willReturn($data);

        $userService = new UserService($usersRepository);
        $response = $userService->getUser(1);
        $this->assertEquals($data, $response);
    }

    public function test_store_user_service()
    {
        $data = [
            "name" => "leo",
            "email" => "leo@email.com"
        ];

        $usersRepository = $this->createMock(UserRepository::class);
        $usersRepository->method('create')->willReturn($data);

        $userService = new UserService($usersRepository);
        $response = $userService->storeUser($data);
        $this->assertEquals($data, $response);
    }

    public function test_update_user_service()
    {
        $data = [
            "name" => "leo",
            "email" => "leo@email.com"
        ];

        $return = [
            'message' => 'success'
        ];

        $usersRepository = $this->createMock(UserRepository::class);
        $usersRepository->method('update')->willReturn($return);

        $userService = new UserService($usersRepository);
        $response = $userService->updateUser(1, $data);
        $this->assertEquals($return, $response);
    }

    public function test_delete_user_service()
    {
        $return = [
            'message' => 'deleted'
        ];

        $usersRepository = $this->createMock(UserRepository::class);
        $usersRepository->method('delete')->willReturn($return);

        $userService = new UserService($usersRepository);
        $response = $userService->deleteUser(1);
        $this->assertEquals($return, $response);
    }
}

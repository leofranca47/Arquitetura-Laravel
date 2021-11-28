<?php

namespace App\Services;

use App\Contracts\IUserRepository;

class UserService
{
    protected $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getUsers()
    {
        return $this->repository->getAll();
    }

    public function getUser($id)
    {
        return $this->repository->find($id);
    }

    public function storeUser($data)
    {
        return $this->repository->create($data);
    }

    public function updateUser($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->repository->delete($id);
    }
}

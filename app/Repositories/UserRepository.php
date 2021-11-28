<?php

namespace App\Repositories;

use App\Contracts\IUserRepository;
use App\Models\User;

class UserRepository extends AbstractRepository implements IUserRepository
{
    protected $model = User::class;
}

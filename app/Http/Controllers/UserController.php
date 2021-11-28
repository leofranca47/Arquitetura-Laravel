<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getUsers();
        return UserResource::collection($users);
    }

    public function show($id)
    {
        return new UserResource($this->userService->getUser($id));
    }

    public function store(StoreUser $request)
    {
        $user = $this->userService->storeUser($request->validated());

        return new UserResource($user);
    }

    public function update($id, UpdateUser $request)
    {
        $response = $this->userService->updateUser($id, $request->validated());

        return response()->json($response);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);

        return response()->json([], 204);
    }
}

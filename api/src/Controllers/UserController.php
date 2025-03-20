<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function createUser($request)
    {
        // Logic to create a user
        $data = $request->getParsedBody();
        return $this->userService->registerUser($data);
    }

    public function getUser($id)
    {
        // Logic to get a user by ID
        return $this->userService->findUserById($id);
    }

    public function updateUser($id, $request)
    {
        // Logic to update a user
        $data = $request->getParsedBody();
        return $this->userService->updateUser($id, $data);
    }

    public function deleteUser($id)
    {
        // Logic to delete a user
        return $this->userService->deleteUser($id);
    }
}
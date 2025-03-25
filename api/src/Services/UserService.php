<?php

namespace App\Services;

use App\Models\User;
use App\Services\AuthService;

class UserService
{
    public function registerUser(array $data): User
    {
        $authService = new AuthService();
        $data['password'] = $authService->generatePasswordHash($data['password']);

        // Logic to register a new user
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->save();

        return $user;
    }

    public function findUserByEmail(string $email): ?User
    {
        $user = new User();
        $user->findByEmail($email);
        return $user;
    }

    public function deleteUser(int $id): bool
    {
        // Logic to delete a user by ID
        // $user = User::find($id);
        // if ($user) {
        //     return $user->delete(); // Pseudo code for deleting user
        // }
        return false; // Placeholder return
    }
}
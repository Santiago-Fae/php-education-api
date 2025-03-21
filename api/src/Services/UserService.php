<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function registerUser(array $data): User
    {
        // Logic to register a new user
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setEmail($data['password']);
        // Save user to the database (pseudo code)
        // $user->save();
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
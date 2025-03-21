<?php

namespace App\Services;

use App\Models\User;
use App\Helpers\Session;
use App\Helpers\Response;
use App\Services\UserService;

class AuthService {
    protected static $userHash = 'PHP_EDUCATION_API_HASH';
    protected static $hashPassword = '$2y$10$8vUuGnVtD4O9GRls9thnS.7r2gM0z6M8zDs2IvIx9Xt0jhz4pDS4S';

    public function authenticate(array $data): bool
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                Session::start();
            }
            
            $user = new UserService();
            $user = $user->findUserByEmail($data['email']);

            if ($user && password_verify($data['password'], $user->getPassword())) {
                Session::setVar(self::$userHash, $user->getEmail());
                return true;
            }
        } 
        catch (\Exception $e) {
            error_log('Error: ' . $e->getMessage());
        }
        return false;
    }

    public function generatePasswordHash($password): string
    {
        return password_hash($password, $this->hashPassword);
    }

    public function findAuthById(int $id): ?Auth
    {
        // Logic to find a auth by ID
        // return Auth::find($id); // Pseudo code for fetching auth
        return null; // Placeholder return
    }

    public function deleteAuth(int $id): bool
    {
        // Logic to delete a auth by ID
        // $auth = Auth::find($id);
        // if ($auth) {
        //     return $auth->delete(); // Pseudo code for deleting auth
        // }
        return false; // Placeholder return
    }
}
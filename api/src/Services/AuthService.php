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

    public function isLogged(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            Session::start();
        }
        return isset($_SESSION[self::$userHash]) && !empty($_SESSION[self::$userHash]);
    }

    public function logout(): bool
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                Session::start();
            }

            if (isset($_SESSION[self::$userHash])) {
                unset($_SESSION[self::$userHash]);
                Session::close();
            }
            return true;
        } 
        catch (\Exception $e) {
            error_log('Error during logout: ' . $e->getMessage());
        }

        return false;
    }
}
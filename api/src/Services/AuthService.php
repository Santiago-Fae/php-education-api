<?php

namespace App\Services;

use App\Models\User;
use App\Helpers\Session;
use App\Helpers\Response;

class AuthService {
    protected static $userHash = 'PHP_EDUCATION_API_HASH';

    public function authenticate(array $data): bool
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                Session::start();
            }
    
            $user = User::where('email', $data['email'])->first();
    
            if ($user && password_verify($data['password'], $user->password)) {
                Session::setVar(self::$userHash, $user->email);
                return true;
            }
        } 
        catch (\Exception $e) {
            error_log('Error: ' . $e->getMessage());
        }
        return false;
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
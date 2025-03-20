<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Helpers\Response;

class AuthController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login($request)
    {
        // Logic to create a auth
        $data = $request->getParsedBody();
        if ($this->authService->authenticate($data)) {
            Response::send(200, 'User successfully authenticated');
        } 
        else {
            Response::send(401, 'Invalid credentials');
        }
    }

    public function authenticate($id)
    {
        
    }

    public function logout($id)
    {
        // Logic to delete a auth
        return $this->authService->deleteAuth($id);
    }
}
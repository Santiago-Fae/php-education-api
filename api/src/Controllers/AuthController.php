<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Services\AuthService;
use App\Helpers\ResponseMessage;
use App\Helpers\RequestBody;

class AuthController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login(Request $request, Response $response)
    {
        // Captura o corpo da requisição como uma string
        $data = RequestBody::getBody($request);

        if ($this->authService->authenticate($data)) {
            ResponseMessage::send(200, 'User successfully authenticated');
        } 
        else {
            ResponseMessage::send(401, 'Invalid credentials');
        }
    }

    public function isLogged()
    {
        if ($this->authService->isLogged()) {
            return true;
        } 
        else {
            ResponseMessage::send(403, 'User is not logged');
        }
    }

    public function logout()
    {
        // Logic to delete a auth
        if ($this->authService->logout()) {
            ResponseMessage::send(200, 'User successfully logged out');
        } 
        else {
            ResponseMessage::send(401, 'Error logging out');
        }
    }
}
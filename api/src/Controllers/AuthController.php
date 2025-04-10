<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Models\Log;
use App\Services\AuthService;
use App\Helpers\ResponseMessage;
use App\Helpers\RequestBody;

class AuthController
{
    protected $authService;
    protected $log;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->log = new Log();
    }

    public function login(Request $request, Response $response)
    {
        $data = RequestBody::getBody($request);

        if ($this->authService->authenticate($data)) {
            ResponseMessage::send(200, 'User successfully authenticated');
        } 
        else {
            $this->log->saveLog($request, 'Failed login attempt', 1);
            ResponseMessage::send(401, 'Invalid credentials');
        }
    }

    public function isLogged()
    {
        if ($this->authService->isLogged()) {
            return true;
        } 
        else {
            $this->log->saveLog(null, 'User is not logged', 1);
            ResponseMessage::send(403, 'User is not logged');
        }
    }

    public function logout()
    {
        if ($this->authService->logout()) {
            ResponseMessage::send(200, 'User successfully logged out');
        } 
        else {
            ResponseMessage::send(401, 'Error logging out');
        }
    }
    public function getUser()
    {
        if ($this->authService->isLogged()) {
            return $this->authService->getUser();
        } 
        else {
            $this->log->saveLog(null, 'User is not logged', 1);
            ResponseMessage::send(403, 'User is not logged');
        }
    }
}
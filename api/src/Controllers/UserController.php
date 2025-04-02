<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Controllers\AuthController;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\RequestBody;
use App\Helpers\ResponseMessage;

class UserController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function createUser(Request $request)
    {
        $authController = new AuthController();
        $authController->isLogged();

        // Captura o corpo da requisição como uma string
        $data = RequestBody::getBody($request);
        if ($this->userService->registerUser($data)) {
            ResponseMessage::send(200, 'Created user successfully');
        }
        else {
            ResponseMessage::send(401, 'Error creating user');
        }

    }

    public function getUser($id)
    {
        // Logic to get a user by ID
        // return $this->userService->findUserById($id);
    }

    public function updateUser($id, $request)
    {
        // Logic to update a user
        // $data = $request->getParsedBody();
        // return $this->userService->updateUser($id, $data);
    }

    public function deleteUser($id)
    {
        // Logic to delete a user
        // return $this->userService->deleteUser($id);
    }
}
<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Controllers\AuthController;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\RequestBody;
use App\Helpers\ResponseMessage;
use App\Helpers\ResponseHelper;

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
            ResponseMessage::send(200, "Created user successfully");
        } else {
            ResponseMessage::send(401, "Error creating user");
        }
    }

    public function getUser(Request $request)
    {
        // Logic to get a user by ID
        $data = RequestBody::getBody($request);
        $user = $this->userService->findUserById($data["id"]);
        ResponseHelper::success($user);
    }

    public function updateUser($request)
    {
        $authController = new AuthController();
        $authController->isLogged();

        // Captura o corpo da requisição como uma string
        $data = RequestBody::getBody($request);
        if ($this->userService->updateUser($data)) {
            ResponseMessage::send(200, "Updated user successfully");
        } else {
            ResponseMessage::send(401, "Error creating user");
        }
    }

    public function deleteUser($id)
    {
        // Logic to delete a user
        // return $this->userService->deleteUser($id);
    }
}

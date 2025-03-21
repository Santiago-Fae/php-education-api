<?php

use Slim\Factory\AppFactory;
use App\Controllers\UserController;
use App\Controllers\AuthController;

require dirname(__DIR__) . '../../vendor/autoload.php';
$app = AppFactory::create();

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write('Hello, world!');
    //response 200
    $response->withHeader('Content-Type', 'application/json');
    return $response;
});

$app->post('/login', function ($request, $response) {
    $authController = new AuthController(); 
    return $authController->login($request, $response); 
});

$app->post('/users', [UserController::class, 'createUser']);
$app->get('/users/{id}', [UserController::class, 'getUser']);
$app->put('/users/{id}', [UserController::class, 'updateUser']);
$app->delete('/users/{id}', [UserController::class, 'deleteUser']);

$app->run();
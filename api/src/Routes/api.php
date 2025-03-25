<?php

use Slim\Factory\AppFactory;
use App\Controllers\UserController;
use App\Controllers\AuthController;

require dirname(__DIR__) . '../../vendor/autoload.php';
$app = AppFactory::create();

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write(json_encode(['message' => 'Hello, world!']));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
});

$app->post('/login', [new AuthController(), 'login']);
$app->post('/logout', [new AuthController(), 'logout']);
$app->post('/users', [new UserController(), 'createUser']);
/* $app->get('/users/{id}', [UserController::class, 'getUser']);
$app->put('/users/{id}', [UserController::class, 'updateUser']);
$app->delete('/users/{id}', [UserController::class, 'deleteUser']); */

$app->run();


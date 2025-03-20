<?php

use Slim\Factory\AppFactory;
use App\Controllers\UserController;

require dirname(__DIR__) . '../../vendor/autoload.php';
$app = AppFactory::create();

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write('Hello, world!');
    return $response;
});

$app->post('/users', [UserController::class, 'createUser']);
$app->get('/users/{id}', [UserController::class, 'getUser']);
$app->put('/users/{id}', [UserController::class, 'updateUser']);
$app->delete('/users/{id}', [UserController::class, 'deleteUser']);

$app->run();
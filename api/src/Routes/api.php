<?php

use Slim\Factory\AppFactory;
use App\Middleware\LogMiddleware;
use App\Controllers\UserController;
use App\Controllers\AuthController;
use App\Controllers\ClassController;

require dirname(__DIR__) . "../../vendor/autoload.php";
$app = AppFactory::create();

// Add LogMiddleware to the application
$logMiddleware = new LogMiddleware();
$app->add(function ($request, $handler) use ($logMiddleware) {
    return $logMiddleware->handle($request, $handler);
});

$app->get("/", function ($request, $response, $args) {
    $response->getBody()->write(json_encode(["message" => "Hello, world!"]));
    return $response
        ->withHeader("Content-Type", "application/json")
        ->withStatus(200);
});

$app->post("/login", [new AuthController(), "login"]);
$app->post("/logout", [new AuthController(), "logout"]);
$app->post("/users", [new UserController(), "createUser"]);
$app->get("/users", [new UserController(), "getUser"]);
$app->patch("/users", [new UserController(), "updateUser"]);
$app->post("/classes", [new ClassController(), "createClass"]);
$app->get("/classes", [new ClassController(), "getClass"]);
$app->patch("/classes", [new ClassController(), "updateClass"]);
$app->delete("/classes", [new ClassController(), "deleteClass"]);

/* $app->get('/users/{id}', [UserController::class, 'getUser']);
$app->put('/users/{id}', [UserController::class, 'updateUser']);
$app->delete('/users/{id}', [UserController::class, 'deleteUser']); */

$app->run();

<?php
require_once '../src/Routes/api.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

$apiRoutes = new ApiRoutes();
$apiRoutes->handleRequest($requestMethod, $requestUri);
?>
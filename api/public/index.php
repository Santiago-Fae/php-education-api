<?php
ini_set('display_errors', 1);

ini_set('display_startup_erros', 1);

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

require_once "../vendor/autoload.php";
require_once '../src/Routes/api.php';
?>

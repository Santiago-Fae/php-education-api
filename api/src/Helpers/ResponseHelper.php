<?php
namespace App\Helpers;
class ResponseHelper
{
    public static function success(
        $data,
        $message = "Success",
        $statusCode = 200
    ) {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        echo json_encode([
            "status" => "success",
            "message" => $message,
            "data" => $data,
        ]);
        exit();
    }

    public static function error($message, $statusCode = 400)
    {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        return json_encode([
            "status" => "error",
            "message" => $message,
        ]);
    }
}

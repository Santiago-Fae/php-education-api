<?php

class ResponseHelper
{
    public static function success($data, $message = 'Success', $statusCode = 200)
    {
        http_response_code($statusCode);
        return json_encode([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function error($message, $statusCode = 400)
    {
        http_response_code($statusCode);
        return json_encode([
            'status' => 'error',
            'message' => $message
        ]);
    }
}
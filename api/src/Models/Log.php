<?php

namespace App\Models;
use App\Helpers\RequestBody;


class Log
{
    private $db;
    private $pdo;

    public function __construct()
    {
        // pdo db connection
        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
        $this->verifyOrCreateTable(); // log table
    }

    public function saveLog($request = null, $message, $isError = 0)
    {
        if ($request) {
            $type = $request->getMethod();
            $body = RequestBody::getBody($request);
        }
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';    

        $sql = "INSERT INTO logs (message, is_error, request_type, request_body, ip_address, created_at) 
            VALUES (:message, :is_error, :type, :body, :ip_address, :created_at)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':message' => $message,
            ':is_error' => $isError,
            ':type' => $type,
            ':body' => $body ? json_encode($body) : null,
            ':ip_address' => $ipAddress,
            ':created_at' => date('Y-m-d H:i:s'),
        ]);
    }
    private function verifyOrCreateTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS logs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            message TEXT NOT NULL,
            is_error TINYINT(1) NOT NULL DEFAULT 0,
            request_type VARCHAR(255) DEFAULT NULL,
            request_body TEXT DEFAULT NULL,
            ip_address VARCHAR(45) DEFAULT 'unknown',
            created_at DATETIME NOT NULL
        )";

        $this->pdo->exec($sql);
    }
}

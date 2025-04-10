<?php
namespace App\Models;
use PDO;
use PDOException;

class DB {
    private $host = 'localhost';
    private $dbName = 'education_system';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    // Method to establish a connection to the database
    private function connect() {
        try {
            // DSN (Data Source Name) for the connection
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If an error occurs, display the message
            die('Connection failed: ' . $e->getMessage());
        }
    }

    // Method to return the PDO instance
    public function getConnection() {
        return $this->pdo;
    }
}
?>

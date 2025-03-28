<?php
namespace App\Models;
use PDO;
use PDOException;

class DB {
    private $host = 'localhost'; // Database server address
    private $dbName = 'education_system'; // Database name
    private $username = 'root'; // Database username
    private $password = ''; // Database password
    private $pdo; // PDO instance

    public function __construct() {
        $this->connect();
    }

    // Method to establish a connection to the database
    private function connect() {
        try {
            // DSN (Data Source Name) for the connection
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error mode
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

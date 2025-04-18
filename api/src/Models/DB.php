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

    private $host = '127.0.0.1'; // Endereço do servidor MySQL
private $dbName = 'education_system'; // Nome do banco de dados
private $username = 'root'; // Usuário padrão do MySQL no AMPPS
private $password = ''; // Senha padrão do MySQL no AMPPS

    
    private $pdo; // PDO instance
    private $host = 'localhost';
    private $dbName = 'education_system';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->pdo;
    }
}
?>

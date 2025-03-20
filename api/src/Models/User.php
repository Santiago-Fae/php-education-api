<?php
namespace App\Models;

use App\Models\DB;
use PDO;
use PDOException;

class User {
    private $id;
    private $name;
    private $email;
    private $db;
    private $pdo;

    public function __construct($id = null, $name = null, $email = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;

        // Initialize PDO connection
        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
  }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function save() {
        if ($this->id) {
            // Update existing user
            $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->execute([
                ':name' => $this->name,
                ':email' => $this->email,
                ':id' => $this->id
            ]);
        } else {
            // Insert new user
            $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
            $stmt->execute([
                ':name' => $this->name,
                ':email' => $this->email
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
    }

    public function find($id) {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? $user : null;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
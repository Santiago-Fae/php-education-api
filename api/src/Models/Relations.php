<?php

namespace App\Models;

use App\Models\DB;
use PDO;
use PDOException;

class Relations
{
    public ?int $id;
    public ?int $user_id;
    public ?int $class_id;

    private DB $db;
    private PDO $pdo;

    public function __construct($id = null, $user_id = null, $class_id = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->class_id = $class_id;

        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
    }

    // Save a user-class relationship
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare(
                "UPDATE classuserlink SET user_id = :user_id, class_id = :class_id WHERE id = :id"
            );
            $stmt->execute([
                ':user_id' => $this->user_id,
                ':class_id' => $this->class_id,
                ':id' => $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare(
                "INSERT INTO classuserlink (user_id, class_id) VALUES (:user_id, :class_id)"
            );
            $stmt->execute([
                ':user_id' => $this->user_id,
                ':class_id' => $this->class_id
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
    }

    // Find all classes for a user
    public function getClassesForUser($userId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT c.* FROM classes c
            JOIN classuserlink cu ON c.id = cu.class_id
            WHERE cu.user_id = :user_id
        ");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Find all users for a class
    public function getUsersForClass($classId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT u.* FROM users u
            JOIN classuserlink cu ON u.id = cu.user_id
            WHERE cu.class_id = :class_id
        ");
        $stmt->execute([':class_id' => $classId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Optional: delete a relationship
    public function delete()
    {
        $stmt = $this->pdo->prepare("DELETE FROM classuserlink WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}

<?php
namespace App\Models;

use App\Models\DB;
use PDO;
use PDOException;

class ClassUserLink
{
    public ?int $id;
    public ?int $userId;
    public ?int $classId;
    public ?string $createdAt;

    private DB $db;
    private PDO $pdo;

    public function __construct(
        $id = null,
        $userId = null,
        $classId = null,
        $createdAt = null
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->classId = $classId;
        $this->createdAt = $createdAt;

        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUserId(): ?int
    {
        return $this->userId;
    }
    public function getClassId(): ?int
    {
        return $this->classId;
    }
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setClassId($classId)
    {
        $this->classId = $classId;
    }

 // saving the data 
    public function save(): ?int
    {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO classuserlink (user_id, class_id)
                VALUES (:user_id, :class_id)
            ");
            $stmt->execute([
                ":user_id" => $this->userId,
                ":class_id" => $this->classId,
            ]);

            $this->id = (int) $this->pdo->lastInsertId();
            return $this->id;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function find($id)
    {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM classuserlink WHERE id = :id"
            );
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
    // creating the object on a row
    public function populate(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->userId = $data["user_id"] ?? null;
        $this->classId = $data["class_id"] ?? null;
        $this->createdAt = $data["created_at"] ?? null;
    }
}

?>

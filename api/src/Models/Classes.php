<?php

namespace App\Models;

use App\Models\DB;
use PDO;
use PDOException;

class Classes
{
    public ?int $id;
    public ?string $name;
    public ?string $hour;
    public ?string $classroom;

    private DB $db;
    private PDO $pdo;

    public function __construct(
        $id = null,
        $name = null,
        $hour = null,
        $classroom = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->hour = $hour;
        $this->classroom = $classroom;
        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getHour(): ?string
    {
        return $this->hour;
    }
    public function getClassroom(): ?string
    {
        return $this->classroom;
    }
  
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setClassroom($classroom)
    {
        $this->classroom = $classroom;
    }

    // saave the class
    public function save()
    {
        if ($this->id) {
            // update existing class
            $stmt = $this->pdo->prepare(
                "UPDATE classes SET name = :name, hour = :hour, Classroom = :classroom WHERE id = :id"
            );
            $stmt->execute([
                ":name" => $this->name,
                ":hour" => $this->hour,
                ":classroom" => $this->classroom,
                ":id" => $this->id,
            ]);
        } else {
            // insert a new class instead
            $stmt = $this->pdo->prepare(
                "INSERT INTO classes (name, hour, Classroom) VALUES (:name, :hour, :classroom)"
            );
            $stmt->execute([
                ":name" => $this->name,
                ":hour" => $this->hour,
                ":classroom" => $this->classroom,
            ]);
            $this->id = $this->pdo->lastInsertId("id");
        }
    }
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM classes WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", intval($id));
            $stmt->execute();
            $class = $stmt->fetch(PDO::FETCH_ASSOC);
            return $class ?: null;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    public function populate(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->name = $data["name"] ?? null;
        $this->hour = $data["hour"] ?? null;
        $this->classroom = $data["Classroom"] ?? null;
    }

    public function delete(): bool
{
    try {
        $stmt = $this->pdo->prepare("DELETE FROM classes WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        return false;
    }
}

}

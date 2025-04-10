<?php
namespace App\Models;

use App\Models\DB;
use PDO;
use PDOException;

class User
{
    private $id;
    private $name;
    private $email;
    private $permission;
    private $password;
    private $db;
    private $pdo;

    public function __construct($id = null, $name = null, $email = null,$permission = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->permission = $permission;
        // start the pdo connection
        $this->db = new DB();
        $this->pdo = $this->db->getConnection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPermission() 
    {
        return $this->permission;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
      public function setPermission($permission)
    {
        $this->permission = $permission;
    }
    public function save()
    {
        if ($this->id) {
            //if it has id update existing user
            $stmt = $this->pdo->prepare(
                "UPDATE users SET name = :name, email = :email, permission = :permission WHERE id = :id"
            );
            $stmt->execute([
                ":name" => $this->name,
                ":email" => $this->email,
                ":permission" => $this->permission,
                ":id" => $this->id
            ]);
        } else {
            // if no id will insert a new user
            $stmt = $this->pdo->prepare(
                "INSERT INTO users (name, email, password, permission) VALUES (:name, :email, :password, :permission)"
            );
            $stmt->execute([
                ":name" => $this->name,
                ":email" => $this->email,
                ":password" => $this->password,
                ":permission" => $this->permission
            ]);
            $this->id = $this->pdo->lastInsertId("id");
        }
    }

    public function find($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", intval($id));
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: null;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    public function findByEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? $this->populate($user) : null;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function populate(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->name = $data["name"] ?? null;
        $this->email = $data["email"] ?? null;
        $this->password = $data["password"] ?? null;
        $this->permission = $data["permission"] ?? null;
    }

     public function deleteUser( $id)
    {
        print_r($id);
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", intval($id));
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}

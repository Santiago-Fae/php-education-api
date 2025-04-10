<?php

namespace App\Services;
use PDO;
use PDOException;
use App\Models\User;
use App\Models\Relations;
use App\Services\AuthService;


class UserService
{
    private PDO $pdo;
    public function registerUser(array $data): User
    {
        $authService = new AuthService();
        $data["password"] = $authService->generatePasswordHash(
            $data["password"]
        );

        // Logic to register a new user
        $user = new User();
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);
        $user->setPassword($data["password"]);
        $user->save();

        return $user;
    }

    public function findUserByEmail(string $email): ?User
    {
        $user = new User();
        $user->findByEmail($email);
        return $user;
    }

    public function findUserById(string $id)
    {
        $user = new User();
        $user = $user->find($id);
        $classService = new Relations();
        $classList = $classService->getClassesForUser($id);
        $classCheck = array_column($classList, 'name');
        print_r($user);
        $user["classes"] = $classCheck;
        return $user;
    }

    public function updateUser(array $data): User
    {
        $authService = new AuthService();
        // Logic to register a new user
        $user = new User();
        $user->setId($data["id"]);
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);
        $user->save();

        return $user;
    }

    public function deleteUser(int $id): bool
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}

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
    public function registerUser(array $data)
    {
        $authService = new AuthService();
        $data["password"] = $authService->generatePasswordHash(
            $data["password"]
        );

        // using new instance to register user
        $user = new User();
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);
        $user->setPassword($data["password"]);
        $user->setPermission($data["permission"]);
        try {
            $user->save();
        } catch (PDOException $e) {
            return false;
        }
        $id = $user->getId();
        if($data["classes"]){
            foreach($data["classes"] as $idClass){
                $relation = new Relations(null,$id,$idClass);
                $relation->save();
            }
        }
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

    public function updateUser(array $data)
     {
        $authService = new AuthService();
        // new logic to register user
        $user = new User();
        $user->setId($data["id"]);
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);
        $user->setPermission($data["permission"]);
        try {
            $user->save();
        } catch (PDOException $e) {
            return false;
        }
        $id = $user->getId();
        if($data["classes"]){
            $excludeRelations = new Relations();
            $excludeRelations->deleteRelationsByUserId($id);
            foreach($data["classes"] as $idClass){
                $relation = new Relations(null,$id,$idClass);
                $relation->save();
            }
        }
        return $user;
    }

    public function deleteUser( $id)
    {
    $user = new User();
    return $user->deleteUser($id);
    }
}

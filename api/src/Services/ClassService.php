<?php
namespace App\Services;
use App\Models\Classes;
use PDO;
use PDOException;
class ClassService
{
    private PDO $pdo;
    private Classes $class;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->class = new Classes();
    }

    // public function createClass(
    //     string $name,
    //     string $hour,
    //     string $classroom
    // ): ?int {
    //     $this->class->setName($name);
    //     $this->class->setHour($hour);
    //     $this->class->setClassroom($classroom);

    //     try {
    //         $this->class->save();
    //         return $this->class->getId();
    //     } catch (PDOException $e) {
    //         return null;
    //     }
    // }
public function create(string $name, string $hour, string $classroom): ?int
    {
        $this->class->setName($name);
        $this->class->setHour($hour);
        $this->class->setClassroom($classroom);

        try {
            $this->class->save();
            return $this->class->getId();
        } catch (PDOException $e) {
            return null;
        }
    }



    public function findClassById(int $id): array|null
    {
        try {
            $result = $this->class->find($id);

            if ($result) {
                $this->class->populate($result);
                return $result;
            }

            return null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll(): array
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM classes");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // public function updateClass(
    //     int $id,
    //     string $name,
    //     string $hour,
    //     string $classroom
    // ): bool {
    //     $this->class->setId($id);
    //     $this->class->setName($name);
    //     $this->class->setHour($hour);
    //     $this->class->setClassroom($classroom);

    //     try {
    //         $this->class->save();
    //         return true;
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }
    public function update(int $id, string $name, string $hour, string $classroom): bool
    {
        $this->class->setId($id);
        $this->class->setName($name);
        $this->class->setHour($hour);
        $this->class->setClassroom($classroom);

        try {
            $this->class->save();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function deleteClass(int $id): bool
    {
        $result = $this->class->find($id);

        if ($result) {
            $this->class->populate($result);

            try {
                $stmt = $this->pdo->prepare("DELETE FROM classes WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                return false;
            }
        }

        return false;
    }
//     public function deleteClass(int $id): bool
// {
//     $result = $this->class->find($id);

//     if ($result) {
//         $this->class->populate($result);
//         return $this->class->delete(); // model with handle deletion
//     }

//     return false;
// }

}

?>

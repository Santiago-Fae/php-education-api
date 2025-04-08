<?php 
namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\RequestBody;
use App\Helpers\ResponseMessage;
use App\Helpers\ResponseHelper;
use App\Services\ClassService;
use App\Controllers\AuthController;
use App\Models\DB;

class ClassController
{
    protected $classService;

    public function __construct()
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $this->classService = new ClassService($pdo);
    }

    public function createClass(Request $request)
    {
        $authController = new AuthController();
        $authController->isLogged();

        $data = RequestBody::getBody($request);
        $name = $data['name'] ?? '';
        $hour = $data['hour'] ?? '';
        $classroom = $data['classroom'] ?? '';

        if ($this->classService->create($name, $hour, $classroom)) {
            ResponseMessage::send(200, "Created class successfully");
        } else {
            ResponseMessage::send(401, "Error creating class");
        }
    }

    public function getClass(Request $request)
    {
        $data = RequestBody::getBody($request);
        $class = $this->classService->findClassById($data["id"]);
        ResponseHelper::success($class);
    }

    public function updateClass(Request $request)
    {
        $authController = new AuthController();
        $authController->isLogged();

        $data = RequestBody::getBody($request);
        $id = $data['id'];
        $name = $data['name'];
        $hour = $data['hour'];
        $classroom = $data['classroom'];

        if ($this->classService->update($id, $name, $hour, $classroom)) {
            ResponseMessage::send(200, "Updated class successfully");
        } else {
            ResponseMessage::send(401, "Error updating class");
        }
    }

    public function deleteClass(Request $request)
    {
        $authController = new AuthController();
        $authController->isLogged();

        $data = RequestBody::getBody($request);

        if ($this->classService->deleteClass($data["id"])) {
            ResponseMessage::send(200, "Deleted class successfully");
        } else {
            ResponseMessage::send(401, "Error deleting class");
        }
    }
}





?>
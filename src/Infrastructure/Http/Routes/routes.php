<?php

use Infrastructure\Database\MySQLCourseRepository;
use Infrastructure\Http\Controllers\CourseController;

$repository = new MySQLCourseRepository();
$controller = new CourseController($repository);

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestMethod && $_SERVER['REQUEST_URI'] === '/courses') {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($controller->show($_GET['id']));
        } else {
            echo json_encode($controller->index());
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->store($data);
        break;
    case 'DELETE':
        $id = $_GET['id'];
        $controller->destroy($id);
        break;
    case 'UPDATE':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);        
        $controller->update($id, $data);
    default:
        break;
}
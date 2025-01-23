<?php

namespace Infrastructure\Http\Routes;

use Infrastructure\Database\MySQLCourseRepository;
use Infrastructure\Http\Controllers\CourseController;

$repository = new MySQLCourseRepository();
$controller = new CourseController($repository);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

$requestPath = strtok($requestUri, '?');

if ($requestPath === '/courses') {
    switch ($requestMethod) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode($controller->show($_GET['id']));
            } else {
                $params = [
                    'filter' => $_GET['filter'] ?? null,
                    'sort' => $_GET['sort'] ?? null,
                    'page' => $_GET['page'] ?? 1,
                    'perPage' => $_GET['perPage'] ?? 10
                ];
                echo json_encode($controller->index($params));
            }
            break;

        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            $controller->store($data);
            break;

        case 'DELETE':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $controller->destroy($id);
            } else {
                echo json_encode(['error' => 'ID is required for DELETE']);
            }
            break;

        case 'PUT':
        case 'PATCH':
            $id = $_GET['id'] ?? null;
            $data = json_decode(file_get_contents('php://input'), true);
            if ($id && $data) {
                $controller->update($id, $data);
            } else {
                echo json_encode(['error' => 'ID and data are required for UPDATE']);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}

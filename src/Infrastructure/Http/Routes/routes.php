<?php

namespace Infrastructure\Http\Routes;

use Infrastructure\Database\MySQLCourseRepository;
use Infrastructure\Http\Controllers\CourseController;

$repository = new MySQLCourseRepository();
$controller = new CourseController($repository);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = parse_url($requestUri, PHP_URL_PATH) ?? '';

if (preg_match('#^/courses(/(\d+))?$#', $requestPath, $matches)) {
    switch ($requestMethod) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode($controller->show($_GET['id']));
            } else {
                $params = [
                    'filter' => $_GET['filter'] ?? null
                ];
                echo json_encode($controller->index($params));
            }
            break;

        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            $course = $controller->store($data);
            echo json_encode($course->toArray());
            break;

        case 'DELETE':
            $pathParts = explode('/', $requestPath);
            if (isset($pathParts[2]) && is_numeric($pathParts[2])) {
                $id = (int) $pathParts[2];
                $controller->destroy($id);
                echo json_encode(['message' => 'Course deleted']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid ID for DELETE']);
            }
            break;

        case 'PUT':
        case 'PATCH':
            $pathParts = explode('/', $requestPath);
            if (isset($pathParts[2]) && is_numeric($pathParts[2])) {
                $id = (int) $pathParts[2];
                $data = json_decode(file_get_contents('php://input'), true);
                $controller->update($id, $data);
                echo json_encode(['message' => 'Course updated']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid ID for UPDATE']);
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

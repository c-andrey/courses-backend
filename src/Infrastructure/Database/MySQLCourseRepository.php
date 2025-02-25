<?php

namespace Infrastructure\Database;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;
use Infrastructure\Database\DatabaseConnection;
use PDO;

class MySQLCourseRepository implements CourseRepositoryInterface
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DatabaseConnection::getConnection();
    }

    public function getAll($filter): array
    {
        $statement = $this->connection->query(
            'SELECT * FROM courses WHERE (name LIKE "%' . $filter . '%" OR description LIKE "%' . $filter . '%") AND deleted_at IS NULL'
        );
        $courses = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($course) {
            $course = new Course(
                $course['id'],
                $course['name'],
                $course['description'],
                $course['status'],
                $course['image'],
                $course['created_at'],
                $course['updated_at'],
                $course['deleted_at']
            );

            return $course->toArray();
        }, $courses);
    }

    public function findById(int $id): Course
    {
        $statement = $this->connection->prepare('SELECT * FROM courses WHERE id = :id');
        $statement->execute(['id' => $id]);
        $course = $statement->fetch(PDO::FETCH_ASSOC);

        return new Course(
            $course['id'],
            $course['name'],
            $course['description'],
            $course['status'],
            $course['image'],
            $course['created_at'],
            $course['updated_at'],
            $course['deleted_at']
        );
    }

    public function create(Course $course): Course
    {
        $statement = $this->connection->prepare('INSERT INTO courses (name, description, status, image, created_at, updated_at) VALUES (:name, :description, :status, :image, :created_at, :updated_at)');
        $statement->execute([
            'name' => $course->getName(),
            'description' => $course->getDescription(),
            'status' => $course->getStatus(),
            'image' => $course->getImage(),
            'created_at' => $course->getCreatedAt(),
            'updated_at' => $course->getUpdatedAt()
        ]);

        $course->setId((int)$this->connection->lastInsertId());
        return $course;
    }

    public function update(Course $course): void
    {
        $statement = $this->connection->prepare('UPDATE courses SET name = :name, description = :description, status = :status, image = :image, updated_at = :updated_at WHERE id = :id');
        $statement->execute([
            'id' => $course->getId(),
            'name' => $course->getName(),
            'description' => $course->getDescription(),
            'status' => $course->getStatus(),
            'image' => $course->getImage(),
            'updated at' => $course->getUpdatedAt()
        ]);
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare('UPDATE courses SET deleted_at = NOW() WHERE id = :id');
        $statement->execute(['id' => $id]);
    }
}

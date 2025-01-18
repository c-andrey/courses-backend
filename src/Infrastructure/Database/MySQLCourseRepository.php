<?php

namespace Infrastructure\Database;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;
use PDO;

class MySQLCourseRepository implements CourseRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $statement = $this->connection->query('SELECT * FROM courses');
        $courses = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($course) {
            return new Course(
                $course['id'],
                $course['name'],
                $course['description'],
                $course['status'],
                $course['image'],
                $course['created_at'],
                $course['updated_at']
            );
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
            $course['updated_at']
        );
    }

    public function create(Course $course): void
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
        $statement = $this->connection->prepare('DELETE FROM courses WHERE id = :id');
        $statement->execute(['id' => $id]);
    }
}
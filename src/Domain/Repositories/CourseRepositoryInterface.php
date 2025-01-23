<?php

namespace Domain\Repositories;

use Domain\Entities\Course;

interface CourseRepositoryInterface
{
    public function getAll($filter): array;
    public function findById(int $id): Course;
    public function create(Course $course): Course;
    public function update(Course $course): void;
    public function delete(int $id): void;
}

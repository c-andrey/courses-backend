<?php

namespace Application\UseCases;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;

class UpdateCourseUseCase
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function execute(int $id, array $data): void
    {
        $course = $this->courseRepository->findById($id);

        $course->setName($data['name']);
        $course->setDescription($data['description']);
        $course->setStatus($data['status']);
        $course->setImage($data['image']);
        $course->setUpdatedAt(date('Y-m-d H:i:s'));

        $this->courseRepository->update($course);
    }
}
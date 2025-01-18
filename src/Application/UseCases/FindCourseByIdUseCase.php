<?php

namespace Application\UseCases;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;

class FindCourseByIdUseCase
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function execute(int $id): Course
    {
        return $this->courseRepository->findById($id);
    }
}
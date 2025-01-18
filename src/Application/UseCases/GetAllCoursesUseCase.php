<?php

namespace Application\UseCases;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;

class GetAllCoursesUseCase
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function execute(): array
    {
        return $this->courseRepository->getAll();
    }
}
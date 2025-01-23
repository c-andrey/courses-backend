<?php

namespace Application\UseCases;

use Domain\Entities\Course;
use Domain\Repositories\CourseRepositoryInterface;

class CreateCourseUseCase
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function execute(array $data): Course
    {
        $course = new Course(
            null,
            $data['name'],
            $data['description'],
            'active',
            $data['image'],
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s'),
            null
        );

        return $this->courseRepository->create($course);
    }
}

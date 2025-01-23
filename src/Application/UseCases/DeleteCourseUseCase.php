<?php

namespace Application\UseCases;

use Domain\Repositories\CourseRepositoryInterface;

class DeleteCourseUseCase
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function execute(int $id): void
    {
        $this->courseRepository->delete($id);
    }
}

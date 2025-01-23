<?php

namespace Infrastructure\Http\Controllers;

use Application\UseCases\CreateCourseUseCase;
use Application\UseCases\DeleteCourseUseCase;
use Application\UseCases\FindCourseByIdUseCase;
use Application\UseCases\GetAllCoursesUseCase;
use Application\UseCases\UpdateCourseUseCase;
use Domain\Repositories\CourseRepositoryInterface;

class CourseController
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index(array $params = [])
    {
        $filter = $params['filter'] ?? null;
        $useCase = new GetAllCoursesUseCase($this->courseRepository);
        return $useCase->execute($filter);
    }

    public function show(int $id)
    {
        $useCase = new FindCourseByIdUseCase($this->courseRepository);
        return $useCase->execute($id);
    }

    public function store(array $data)
    {
        $useCase = new CreateCourseUseCase($this->courseRepository);
        $useCase->execute($data);
    }

    public function update(int $id, array $data)
    {
        $useCase = new UpdateCourseUseCase($this->courseRepository);
        $useCase->execute($id, $data);
    }

    public function destroy(int $id)
    {
        $useCase = new DeleteCourseUseCase($this->courseRepository);
        $useCase->execute($id);
    }
}

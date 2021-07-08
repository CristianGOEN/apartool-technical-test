<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Delete;

use Apartool\Estate\Categories\Application\Find\CategoryFinder;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Shared\Domain\Categories\CategoryId;

final class CategoryDeleter
{
    private CategoryFinder $finder;

    public function __construct(private CategoryRepository $repository)
    {
        $this->finder = new CategoryFinder($repository);
    }

    public function __invoke(CategoryId $id): void
    {
        $category = $this->finder->__invoke($id);
        $this->repository->delete($category->id());
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Find;

use Apartool\Estate\Categories\Domain\Category;
use Apartool\Estate\Categories\Domain\CategoryNotExist;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Shared\Domain\Categories\CategoryId;

final class CategoryFinder
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    public function __invoke(CategoryId $id): ?Category
    {
        $category = $this->repository->search($id);

        $this->ensureCategoryExists($category);

        return $category;
    }

    private function ensureCategoryExists(Category $category = null): void
    {
        if (null === $category) {
            throw new CategoryNotExist();
        }
    }
}

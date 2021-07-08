<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Find;

use Apartool\Estate\Categories\Domain\Categories;
use Apartool\Estate\Categories\Domain\CategoriesNotFound;
use Apartool\Estate\Categories\Domain\CategoryRepository;

final class CategoryFinderAll
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    public function __invoke(): CategoriesResponse
    {
        $categories = $this->repository->searchAll();

        $this->ensureCategoriesAreFound($categories);

        $categoriesResponses = [];

        foreach ($categories->items() as $category) {
            array_push($categoriesResponses, CategoryResponseConverter::create($category)->toPrimitives());
        }

        return new CategoriesResponse($categoriesResponses);
    }

    private function ensureCategoriesAreFound(Categories $categories = null): void
    {
        if (null === $categories) {
            throw new CategoriesNotFound();
        }
    }
}

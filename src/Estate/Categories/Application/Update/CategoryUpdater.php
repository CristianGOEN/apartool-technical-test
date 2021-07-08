<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Update;


use Apartool\Estate\Categories\Application\Find\CategoryFinder;
use Apartool\Estate\Categories\Domain\CategoryActive;
use Apartool\Estate\Categories\Domain\CategoryDescription;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Estate\Categories\Domain\CategoryTitle;
use Apartool\Shared\Domain\Categories\CategoryId;

final class CategoryUpdater
{
    private CategoryFinder $finder;

    public function __construct(private CategoryRepository $repository)
    {
        $this->finder = new CategoryFinder($repository);
    }

    public function __invoke(UpdateCategoryRequest $request): void
    {
        $category = $this->finder->__invoke(new CategoryId($request->id()));

        $title = new CategoryTitle($request->title());
        $description = new CategoryDescription($request->description());
        $active = new CategoryActive($request->active());

        $category->update($title, $description, $active);

        $this->repository->update($category);
    }
}

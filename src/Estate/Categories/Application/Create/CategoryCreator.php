<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Create;

use Apartool\Estate\Categories\Domain\Category;
use Apartool\Estate\Categories\Domain\CategoryActive;
use Apartool\Estate\Categories\Domain\CategoryDescription;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Estate\Categories\Domain\CategoryTitle;
use Apartool\Shared\Domain\Categories\CategoryId;

final class CategoryCreator
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    public function __invoke(CreateCategoryRequest $request): void
    {
        $id = new CategoryId($request->id());
        $name = new CategoryTitle($request->title());
        $description = new CategoryDescription($request->description());
        $active = new CategoryActive($request->active());

        $category = Category::create(
            $id,
            $name,
            $description,
            $active
        );

        $this->repository->save($category);
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Find;

use Apartool\Estate\Categories\Domain\Category;

final class CategoryResponseConverter
{
    public static function create(Category $category): CategoryResponse
    {
        return new CategoryResponse(
            $category->id()->value(),
            $category->title()->value(),
            $category->description()->value()
        );
    }
}

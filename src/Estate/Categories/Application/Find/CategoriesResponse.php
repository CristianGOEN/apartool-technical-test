<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Find;

final class CategoriesResponse
{
    public function __construct(private array $categories)
    {
    }

    public function categories(): array
    {
        return $this->categories;
    }
}

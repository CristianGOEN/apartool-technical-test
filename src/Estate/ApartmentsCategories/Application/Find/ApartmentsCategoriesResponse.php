<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Find;

final class ApartmentsCategoriesResponse
{
    public function __construct(private array $apartmentsCategories)
    {
    }

    public function apartmentsCategories(): array
    {
        return $this->apartmentsCategories;
    }
}

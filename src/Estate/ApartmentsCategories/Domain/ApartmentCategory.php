<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Domain;

use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;

final class ApartmentCategory
{
    public function __construct(private ApartmentId $apartmentId, private CategoryId $categoryId)
    {
    }

    public static function create(ApartmentId $apartmentId, CategoryId $categoryId): self
    {
        return new self($apartmentId, $categoryId);
    }

    public function apartmentId(): ApartmentId
    {
        return $this->apartmentId;
    }

    public function categoryId(): CategoryId
    {
        return $this->categoryId;
    }
}

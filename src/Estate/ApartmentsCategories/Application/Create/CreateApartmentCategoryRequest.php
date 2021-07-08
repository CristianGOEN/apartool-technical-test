<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Create;

final class CreateApartmentCategoryRequest
{
    public function __construct(private string $apartmentId, private string $categoryId)
    {
    }

    public function apartmentId(): string
    {
        return $this->apartmentId;
    }

    public function categoryId(): string
    {
        return $this->categoryId;
    }
}

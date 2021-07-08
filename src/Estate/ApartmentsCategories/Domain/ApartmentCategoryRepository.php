<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Domain;

use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;

interface ApartmentCategoryRepository
{
    public function save(ApartmentCategory $apartmentCategory): void;
    public function search(ApartmentId $apartmentId, CategoryId $categoryId): ?ApartmentCategory;
    public function searchAll(ApartmentId $apartmentId): ?ApartmentsCategories;
    public function delete(ApartmentId $apartmentId, CategoryId $categoryId): void;
}

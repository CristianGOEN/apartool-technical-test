<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Find;

use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategory;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryNotExist;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;

final class ApartmentCategoryFinder
{
    public function __construct(private ApartmentCategoryRepository $repository)
    {
    }

    public function __invoke(ApartmentId $apartmentId, CategoryId $categoryId): ?ApartmentCategory
    {
        $apartmentCategory = $this->repository->search($apartmentId, $categoryId);

        $this->ensureApartmentCategoryExists($apartmentCategory);

        return $apartmentCategory;
    }

    private function ensureApartmentCategoryExists(ApartmentCategory $apartmentCategory = null): void
    {
        if (null === $apartmentCategory) {
            throw new ApartmentCategoryNotExist();
        }
    }
}

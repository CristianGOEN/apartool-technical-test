<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Delete;

use Apartool\Estate\ApartmentsCategories\Application\Find\ApartmentCategoryFinder;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;

final class ApartmentCategoryDeleter
{
    private ApartmentCategoryFinder $finder;

    public function __construct(private ApartmentCategoryRepository $repository)
    {
        $this->finder = new ApartmentCategoryFinder($repository);
    }

    public function __invoke(ApartmentId $apartmentId, CategoryId $categoryId): void
    {
        $apartmentCategory = $this->finder->__invoke($apartmentId, $categoryId);
        $this->repository->delete($apartmentCategory->apartmentId(), $apartmentCategory->categoryId());
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Find;

use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentsCategories;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentsCategoriesNotFound;
use Apartool\Shared\Domain\Apartments\ApartmentId;

final class ApartmentCategoryFinderAll
{
    public function __construct(private ApartmentCategoryRepository $repository)
    {
    }

    public function __invoke(ApartmentId $apartmentId): ApartmentsCategoriesResponse
    {
        $apartmentsCategories = $this->repository->searchAll($apartmentId);

        $this->ensureApartmentsCategoriesAreFound($apartmentsCategories);

        $apartmentsCategoriesResponses = [];

        foreach ($apartmentsCategories->items() as $apartmentCategory) {
            array_push($apartmentsCategoriesResponses, ApartmentCategoryResponseConverter::create($apartmentCategory)->toPrimitives());
        }

        return new ApartmentsCategoriesResponse($apartmentsCategoriesResponses);
    }

    private function ensureApartmentsCategoriesAreFound(ApartmentsCategories $apartmentsCategories = null): void
    {
        if (null === $apartmentsCategories) {
            throw new ApartmentsCategoriesNotFound();
        }
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Application\Find;

use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategory;

final class ApartmentCategoryResponseConverter
{
    public static function create(ApartmentCategory $apartmentCategory): ApartmentCategoryResponse
    {
        return new ApartmentCategoryResponse(
            $apartmentCategory->apartmentId()->value(),
            $apartmentCategory->categoryId()->value()
        );
    }
}

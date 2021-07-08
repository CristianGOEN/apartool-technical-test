<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Domain;

use Apartool\Shared\Domain\Collection;

final class ApartmentsCategories extends Collection
{
    protected function type(): string
    {
        return ApartmentCategory::class;
    }
}

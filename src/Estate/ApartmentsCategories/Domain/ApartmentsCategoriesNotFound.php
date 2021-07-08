<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Domain;

use RuntimeException;

final class ApartmentsCategoriesNotFound extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Apartments with this category were not found');
    }
}

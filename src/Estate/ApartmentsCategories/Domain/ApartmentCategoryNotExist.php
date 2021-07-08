<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Domain;

use RuntimeException;

final class ApartmentCategoryNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The apartment relation with category does not exist');
    }
}

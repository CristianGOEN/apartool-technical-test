<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Domain;

use RuntimeException;

final class CategoriesNotFound extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Categories not found');
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Domain;

use RuntimeException;

final class CategoryNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The category does not exist');
    }
}

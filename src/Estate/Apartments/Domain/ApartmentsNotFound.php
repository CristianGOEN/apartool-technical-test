<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Domain;

use RuntimeException;

final class ApartmentsNotFound extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Apartments not found');
    }
}

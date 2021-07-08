<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Domain;

use RuntimeException;

final class ApartmentNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The apartment does not exist');
    }
}

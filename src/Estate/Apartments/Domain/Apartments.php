<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Domain;

use Apartool\Shared\Domain\Collection;

final class Apartments extends Collection
{
    protected function type(): string
    {
        return Apartment::class;
    }
}

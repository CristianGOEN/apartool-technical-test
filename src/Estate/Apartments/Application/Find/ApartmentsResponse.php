<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Find;

final class ApartmentsResponse
{
    public function __construct(private array $apartments)
    {
    }

    public function apartments(): array
    {
        return $this->apartments;
    }
}

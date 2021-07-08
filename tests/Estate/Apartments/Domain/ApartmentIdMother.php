<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Shared\Domain\Apartments\ApartmentId;
use Tests\Shared\UuidMother;

final class ApartmentIdMother
{
    public static function create(string $value): ApartmentId
    {
        return new ApartmentId($value);
    }

    public static function random(): ApartmentId
    {
        return self::create(UuidMother::random());
    }
}

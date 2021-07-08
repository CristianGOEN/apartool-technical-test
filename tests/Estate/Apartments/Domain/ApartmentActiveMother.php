<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Tests\Shared\BoolMother;

final class ApartmentActiveMother
{
    public static function create(bool $value): ApartmentActive
    {
        return new ApartmentActive($value);
    }

    public static function random(): ApartmentActive
    {
        return self::create(BoolMother::random());
    }
}

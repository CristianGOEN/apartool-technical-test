<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Tests\Shared\IntegerMother;

final class ApartmentQuantityMother
{
    public static function create(int $value): ApartmentQuantity
    {
        return new ApartmentQuantity($value);
    }

    public static function random(): ApartmentQuantity
    {
        return self::create(IntegerMother::lessThan(10));
    }
}

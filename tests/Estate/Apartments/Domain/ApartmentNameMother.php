<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Estate\Apartments\Domain\ApartmentName;
use Tests\Shared\WordMother;

final class ApartmentNameMother
{
    public static function create(string $value): ApartmentName
    {
        return new ApartmentName($value);
    }

    public static function random(): ApartmentName
    {
        return self::create(WordMother::random());
    }
}

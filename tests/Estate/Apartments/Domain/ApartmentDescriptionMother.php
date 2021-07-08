<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Tests\Shared\ParagraphMother;

final class ApartmentDescriptionMother
{
    public static function create(string $value): ApartmentDescription
    {
        return new ApartmentDescription($value);
    }

    public static function random(): ApartmentDescription
    {
        return self::create(ParagraphMother::random());
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Domain\Apartment;

final class ApartmentResponseConverter
{
    public static function create(Apartment $apartment): ApartmentResponse
    {
        return new ApartmentResponse(
            $apartment->id()->value(),
            $apartment->name()->value(),
            $apartment->description()->value(),
            $apartment->quantity()->value()
        );
    }
}

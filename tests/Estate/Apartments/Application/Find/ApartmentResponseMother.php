<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Application\Find\ApartmentResponse;
use Apartool\Estate\Apartments\Domain\Apartment;
use Tests\Estate\Apartments\Domain\ApartmentDescriptionMother;
use Tests\Estate\Apartments\Domain\ApartmentIdMother;
use Tests\Estate\Apartments\Domain\ApartmentNameMother;
use Tests\Estate\Apartments\Domain\ApartmentQuantityMother;

final class ApartmentResponseMother
{
    public static function create(
        string $id,
        string $name,
        string $description,
        int $quantity
    ): ApartmentResponse
    {
        return new ApartmentResponse(
            $id,
            $name,
            $description,
            $quantity
        );
    }

    public static function createFromApartment(Apartment $request): ApartmentResponse
    {
        return self::create(
            $request->id()->value(),
            $request->name()->value(),
            $request->description()->value(),
            $request->quantity()->value()
        );
    }

    public static function random(): ApartmentResponse
    {
        return self::create(
            ApartmentIdMother::random()->value(),
            ApartmentNameMother::random()->value(),
            ApartmentDescriptionMother::random()->value(),
            ApartmentQuantityMother::random()->value()
        );
    }
}

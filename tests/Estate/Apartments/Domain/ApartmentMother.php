<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Domain;

use Apartool\Estate\Apartments\Application\Create\CreateApartmentRequest;
use Apartool\Estate\Apartments\Application\Update\UpdateApartmentRequest;
use Apartool\Estate\Apartments\Domain\Apartment;
use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Apartool\Estate\Apartments\Domain\ApartmentName;
use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Apartool\Shared\Domain\Apartments\ApartmentId;

final class ApartmentMother
{
    public static function create(
        ApartmentId $id,
        ApartmentName $name,
        ApartmentDescription $description,
        ApartmentQuantity $quantity,
        ApartmentActive $active
    ): Apartment
    {
        return new Apartment(
            $id,
            $name,
            $description,
            $quantity,
            $active
        );
    }

    public static function createFromRequest(CreateApartmentRequest $request): Apartment
    {
        return self::create(
            ApartmentIdMother::create($request->id()),
            ApartmentNameMother::create($request->name()),
            ApartmentDescriptionMother::create($request->description()),
            ApartmentQuantityMother::create($request->quantity()),
            ApartmentActiveMother::create($request->active()),
        );
    }

    public static function random(): Apartment
    {
        return self::create(
            ApartmentIdMother::random(),
            ApartmentNameMother::random(),
            ApartmentDescriptionMother::random(),
            ApartmentQuantityMother::random(),
            ApartmentActiveMother::random(),
        );
    }


    public static function updateFromRequest(UpdateApartmentRequest $request): Apartment
    {
        return self::create(
            ApartmentIdMother::create($request->id()),
            ApartmentNameMother::create($request->name()),
            ApartmentDescriptionMother::create($request->description()),
            ApartmentQuantityMother::create($request->quantity()),
            ApartmentActiveMother::create($request->active()),
        );
    }
}

<?php

declare(strict_types=1);


namespace Tests\Estate\Apartments\Domain;


final class ApartmentsMother
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

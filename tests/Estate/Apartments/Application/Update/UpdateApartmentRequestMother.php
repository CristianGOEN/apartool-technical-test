<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Update;

use Apartool\Estate\Apartments\Application\Update\UpdateApartmentRequest;
use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Apartool\Estate\Apartments\Domain\ApartmentName;
use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Tests\Estate\Apartments\Domain\ApartmentActiveMother;
use Tests\Estate\Apartments\Domain\ApartmentDescriptionMother;
use Tests\Estate\Apartments\Domain\ApartmentIdMother;
use Tests\Estate\Apartments\Domain\ApartmentNameMother;
use Tests\Estate\Apartments\Domain\ApartmentQuantityMother;

final class UpdateApartmentRequestMother
{
    public static function create(ApartmentId $id, ApartmentName $name, ApartmentDescription $description, ApartmentQuantity $quantity, ApartmentActive $active): UpdateApartmentRequest
    {
        return new UpdateApartmentRequest($id->value(), $name->value(), $description->value(), $quantity->value(), $active->value());
    }

    public static function random(): UpdateApartmentRequest
    {
        return self::create(ApartmentIdMother::random(), ApartmentNameMother::random(), ApartmentDescriptionMother::random(), ApartmentQuantityMother::random(), ApartmentActiveMother::random());
    }

}

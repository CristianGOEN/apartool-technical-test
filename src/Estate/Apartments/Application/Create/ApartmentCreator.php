<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Create;

use Apartool\Estate\Apartments\Domain\Apartment;
use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Apartool\Estate\Apartments\Domain\ApartmentName;
use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;


final class ApartmentCreator
{
    public function __construct(private ApartmentRepository $repository)
    {
    }

    public function __invoke(CreateApartmentRequest $request): void
    {
        $id = new ApartmentId($request->id());
        $name = new ApartmentName($request->name());
        $description = new ApartmentDescription($request->description());
        $quantity = new ApartmentQuantity($request->quantity());
        $active = new ApartmentActive($request->active());

        $apartment = Apartment::create(
            $id,
            $name,
            $description,
            $quantity,
            $active
        );

        $this->repository->save($apartment);
    }
}

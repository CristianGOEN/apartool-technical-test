<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Update;


use Apartool\Estate\Apartments\Application\Find\ApartmentFinder;
use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Apartool\Estate\Apartments\Domain\ApartmentName;
use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;

final class ApartmentUpdater
{
    private ApartmentFinder $finder;

    public function __construct(private ApartmentRepository $repository)
    {
        $this->finder = new ApartmentFinder($repository);
    }

    public function __invoke(UpdateApartmentRequest $request): void
    {
        $apartment = $this->finder->__invoke(new ApartmentId($request->id()));

        $name = new ApartmentName($request->name());
        $description = new ApartmentDescription($request->description());
        $quantity = new ApartmentQuantity($request->quantity());
        $active = new ApartmentActive($request->active());

        $apartment->update($name, $description, $quantity, $active);

        $this->repository->update($apartment);
    }
}

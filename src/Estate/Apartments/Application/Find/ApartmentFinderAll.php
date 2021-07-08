<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Estate\Apartments\Domain\Apartments;
use Apartool\Estate\Apartments\Domain\ApartmentsNotFound;

final class ApartmentFinderAll
{
    public function __construct(private ApartmentRepository $repository)
    {
    }

    public function __invoke(): ApartmentsResponse
    {
        $apartments = $this->repository->searchAll();

        $this->ensureApartmentsAreFound($apartments);

        $apartmentsResponses = [];

        foreach ($apartments->items() as $apartment) {
            array_push($apartmentsResponses, ApartmentResponseConverter::create($apartment)->toPrimitives());
        }

        return new ApartmentsResponse($apartmentsResponses);
    }

    private function ensureApartmentsAreFound(Apartments $apartments = null): void
    {
        if (null === $apartments) {
            throw new ApartmentsNotFound();
        }
    }
}

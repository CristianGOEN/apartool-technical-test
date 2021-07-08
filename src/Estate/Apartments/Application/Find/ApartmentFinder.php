<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Domain\Apartment;
use Apartool\Estate\Apartments\Domain\ApartmentNotExist;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;

final class ApartmentFinder
{
    public function __construct(private ApartmentRepository $repository)
    {
    }

    public function __invoke(ApartmentId $id): ?Apartment
    {
        $apartment = $this->repository->search($id);

        $this->ensureApartmentExists($apartment);

        return $apartment;
    }

    private function ensureApartmentExists(Apartment $apartment = null): void
    {
        if (null === $apartment) {
            throw new ApartmentNotExist();
        }
    }
}

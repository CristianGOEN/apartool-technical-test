<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Delete;

use Apartool\Estate\Apartments\Application\Find\ApartmentFinder;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Shared\Domain\Apartments\ApartmentId;

final class ApartmentDeleter
{
    private ApartmentFinder $finder;

    public function __construct(private ApartmentRepository $repository)
    {
        $this->finder = new ApartmentFinder($repository);
    }

    public function __invoke(ApartmentId $id): void
    {
        $apartment = $this->finder->__invoke($id);
        $this->repository->delete($apartment->id());
    }
}

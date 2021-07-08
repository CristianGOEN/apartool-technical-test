<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Update;

use Apartool\Estate\Apartments\Application\Update\ApartmentUpdater;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Tests\Estate\Apartments\Domain\ApartmentActiveMother;
use Tests\Estate\Apartments\Domain\ApartmentDescriptionMother;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\Estate\Apartments\Domain\ApartmentNameMother;
use Tests\Estate\Apartments\Domain\ApartmentQuantityMother;
use Tests\TestCase;

final class ApartmentUpdaterTest extends TestCase
{
    /** @test */
    public function it_should_update_an_existing_apartment(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(ApartmentRepository::class);
        $updater = new ApartmentUpdater($repository);

        $apartment = ApartmentMother::random();

        $repository->expects($this->once())->method("search")->with($apartment->id())->willReturn($apartment);

        $updateApartmentRequest = UpdateApartmentRequestMother::create($apartment->id(), ApartmentNameMother::random(), ApartmentDescriptionMother::random(), ApartmentQuantityMother::random(), ApartmentActiveMother::random());

        $updatedApartment = ApartmentMother::updateFromRequest($updateApartmentRequest);

        $repository->expects($this->once())->method("update")->with($updatedApartment);

        $updater->__invoke($updateApartmentRequest);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Application\Find\ApartmentFinder;
use Apartool\Estate\Apartments\Domain\ApartmentNotExist;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Tests\Estate\Apartments\Domain\ApartmentIdMother;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\TestCase;

final class ApartmentFinderTest extends TestCase
{
    /** @test */
    public function it_should_throw_an_exception_when_the_apartment_not_exist(): void
    {
        $this->expectException(ApartmentNotExist::class);

        $repository = $this->createMock(ApartmentRepository::class);
        $finder = new ApartmentFinder($repository);
        $id = ApartmentIdMother::random();
        $repository->expects($this->once())->method("search")->with($id);
        $finder->__invoke($id);
    }

    /** @test */
    public function it_should_find_an_existing_apartment(): void
    {
        $apartment = ApartmentMother::random();

        $repository = $this->createMock(ApartmentRepository::class);
        $repository->expects($this->once())->method("search")->with($apartment->id())->willReturn($apartment);

        $finder = new ApartmentFinder($repository);
        $apartmentFromRepository = $finder->__invoke($apartment->id());

        $this->assertEquals($apartmentFromRepository, $apartment);
    }
}

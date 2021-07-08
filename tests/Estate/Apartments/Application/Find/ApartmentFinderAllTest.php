<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Find;

use Apartool\Estate\Apartments\Application\Find\ApartmentFinderAll;
use Apartool\Estate\Apartments\Application\Find\ApartmentsResponse;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Estate\Apartments\Domain\Apartments;
use Apartool\Estate\Apartments\Domain\ApartmentsNotFound;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\TestCase;

final class ApartmentFinderAllTest extends TestCase
{
    /** @test */
    public function it_should_return_a_list_of_apartments(): void
    {
        $apartmentOne = ApartmentMother::random();
        $apartmentTwo = ApartmentMother::random();

        $apartments = new Apartments([$apartmentOne, $apartmentTwo]);

        $repository = $this->createMock(ApartmentRepository::class);
        $repository->expects($this->once())->method("searchAll")->willReturn($apartments);

        $finderAll = new ApartmentFinderAll($repository);
        $apartmentsFromRepository = $finderAll->__invoke();

        $this->assertInstanceOf(ApartmentsResponse::class, $apartmentsFromRepository);
        $this->assertCount(2, $apartmentsFromRepository->apartments());
    }

    /** @test */
    public function it_should_throw_an_exception_when_apartments_are_not_found(): void
    {
        $this->expectException(ApartmentsNotFound::class);

        $repository = $this->createMock(ApartmentRepository::class);
        $finderAll = new ApartmentFinderAll($repository);
        $repository->expects($this->once())->method("searchAll");
        $finderAll->__invoke();
    }
}

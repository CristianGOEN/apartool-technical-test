<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Infrastructure;

use Apartool\Estate\Apartments\Domain\Apartments;
use Apartool\Estate\Apartments\Infrastructure\EloquentApartmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Estate\Apartments\Domain\ApartmentActiveMother;
use Tests\Estate\Apartments\Domain\ApartmentDescriptionMother;
use Tests\Estate\Apartments\Domain\ApartmentIdMother;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\Estate\Apartments\Domain\ApartmentNameMother;
use Tests\Estate\Apartments\Domain\ApartmentQuantityMother;
use Tests\TestCase;

final class EloquentApartmentRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_should_save_an_apartment(): void
    {
        $repository = new EloquentApartmentRepository();
        $apartment = ApartmentMother::random();

        $repository->save($apartment);
    }

    /** @test */
    public function it_should_return_an_existing_apartment(): void
    {
        $repository = new EloquentApartmentRepository();
        $apartment = ApartmentMother::random();

        $repository->save($apartment);

        $this->assertEquals($apartment, $repository->search($apartment->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_apartment(): void
    {
        $repository = new EloquentApartmentRepository();

        $this->assertNull($repository->search(ApartmentIdMother::random()));
    }

    /** @test */
    public function it_should_return_an_existing_list_of_apartments(): void
    {
        $repository = new EloquentApartmentRepository();

        $apartmentOne = ApartmentMother::random();
        $repository->save($apartmentOne);

        $apartmentTwo = ApartmentMother::random();
        $repository->save($apartmentTwo);

        $apartments = new Apartments([$apartmentOne, $apartmentTwo]);

        $this->assertEqualsCanonicalizing($apartments, $repository->searchAll());
    }

    /** @test */
    public function it_should_delete_an_existing_apartment(): void
    {
        $repository = new EloquentApartmentRepository();
        $apartment = ApartmentMother::random();

        $repository->save($apartment);
        $repository->delete($apartment->id());
    }

    /** @test */
    public function it_should_update_an_existing_apartment(): void
    {
        $repository = new EloquentApartmentRepository();
        $apartment = ApartmentMother::random();

        $repository->save($apartment);

        $updatedApartment = ApartmentMother::create($apartment->id(), ApartmentNameMother::random(), ApartmentDescriptionMother::random(), ApartmentQuantityMother::random(),ApartmentActiveMother::random());
        $repository->update($updatedApartment);

        $this->assertEquals($updatedApartment, $repository->search($apartment->id()));
    }
}

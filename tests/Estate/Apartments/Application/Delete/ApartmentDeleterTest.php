<?php

declare(strict_types=1);


namespace Tests\Estate\Apartments\Application\Delete;

use Apartool\Estate\Apartments\Application\Delete\ApartmentDeleter;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\TestCase;

final class ApartmentDeleterTest  extends TestCase
{
    /** @test */
    public function it_should_delete_an_existing_apartment(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(ApartmentRepository::class);
        $deleter = new ApartmentDeleter($repository);

        $apartment = ApartmentMother::random();

        $repository->expects($this->once())->method("search")->with($apartment->id())->willReturn($apartment);

        $repository->expects($this->once())->method("delete")->with($apartment->id());

        $deleter->__invoke($apartment->id());
    }
}

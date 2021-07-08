<?php

declare(strict_types=1);

namespace Tests\Estate\Apartments\Application\Create;

use Apartool\Estate\Apartments\Application\Create\ApartmentCreator;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Tests\Estate\Apartments\Domain\ApartmentMother;
use Tests\TestCase;

final class ApartmentCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_apartment(): void
    {
        $this->withoutExceptionHandling();
        $repository = $this->createMock(ApartmentRepository::class);
        $creator = new ApartmentCreator($repository);

        $request = CreateApartmentRequestMother::random();

        $apartment = ApartmentMother::createFromRequest($request);

        $repository->expects($this->once())->method("save")->with($apartment);
        $creator->__invoke($request);
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Domain;

use Apartool\Shared\Domain\Apartments\ApartmentId;

interface ApartmentRepository
{
    public function save(Apartment $apartment): void;
    public function search(ApartmentId $id): ?Apartment;
    public function searchAll(): ?Apartments;
    public function update(Apartment $apartment): void;
    public function delete(ApartmentId $id): void;
}

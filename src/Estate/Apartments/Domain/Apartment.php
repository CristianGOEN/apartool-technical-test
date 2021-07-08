<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Domain;

use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Utils;
use DateTime;

final class Apartment
{
    private DateTime $createdOn;
    private DateTime $updatedOn;

    public function __construct(private ApartmentId $id, private ApartmentName $name, private ApartmentDescription $description, private ApartmentQuantity $quantity,  private ApartmentActive $active)
    {
        $this->createdOn = Utils::formatDate(new DateTime('now'));
        $this->updatedOn = Utils::formatDate(new DateTime('now'));
    }

    public static function create(ApartmentId $id, ApartmentName $name, ApartmentDescription $description, ApartmentQuantity $quantity,  ApartmentActive $active): self
    {
        return new self($id, $name, $description, $quantity,  $active);
    }

    public function id(): ApartmentId
    {
        return $this->id;
    }

    public function name(): ApartmentName
    {
        return $this->name;
    }

    public function description(): ApartmentDescription
    {
        return $this->description;
    }

    public function quantity(): ApartmentQuantity
    {
        return $this->quantity;
    }

    public function active(): ApartmentActive
    {
        return $this->active;
    }

    public function createdOn(): DateTime
    {
        return $this->createdOn;
    }

    public function updatedOn(): DateTime
    {
        return $this->updatedOn;
    }

    public function update(ApartmentName $name, ApartmentDescription $description, ApartmentQuantity $quantity, ApartmentActive $active): void
    {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->active = $active;
        $this->updatedOn = Utils::formatDate(new DateTime('now'));
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Update;

final class UpdateApartmentRequest
{
    public function __construct(private string $id, private string $name, private string $description, private int $quantity, private bool $active)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function active(): bool
    {
        return $this->active;
    }
}

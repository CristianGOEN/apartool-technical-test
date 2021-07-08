<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Application\Find;

final class ApartmentResponse
{
    public function __construct(private string $id, private string $name, private string $description, private int $quantity)
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

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Find;

final class CategoryResponse
{
    public function __construct(private string $id, private string $title, private string $description)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}

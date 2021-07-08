<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Application\Update;

final class UpdateCategoryRequest
{
    public function __construct(private string $id, private string $title, private string $description, private bool $active)
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

    public function active(): bool
    {
        return $this->active;
    }
}

<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Domain;

use Apartool\Shared\Domain\Categories\CategoryId;
use Apartool\Shared\Domain\Utils;
use DateTime;

final class Category
{
    private DateTime $createdOn;
    private DateTime $updatedOn;

    public function __construct(private CategoryId $id, private CategoryTitle $title, private CategoryDescription $description, private CategoryActive $active)
    {
        $this->createdOn = Utils::formatDate(new DateTime('now'));
        $this->updatedOn = Utils::formatDate(new DateTime('now'));
    }

    public static function create(CategoryId $id, CategoryTitle $title, CategoryDescription $description, CategoryActive $active): self
    {
        return new self($id, $title, $description, $active);
    }

    public function id(): CategoryId
    {
        return $this->id;
    }

    public function title(): CategoryTitle
    {
        return $this->title;
    }

    public function description(): CategoryDescription
    {
        return $this->description;
    }

    public function active(): CategoryActive
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

    public function update(CategoryTitle $title, CategoryDescription $description, CategoryActive $active): void
    {
        $this->title = $title;
        $this->description = $description;
        $this->active = $active;
        $this->updatedOn = Utils::formatDate(new DateTime('now'));
    }
}

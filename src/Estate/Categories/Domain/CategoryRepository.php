<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Domain;

use Apartool\Shared\Domain\Categories\CategoryId;

interface CategoryRepository
{
    public function save(Category $category): void;
    public function search(CategoryId $id): ?Category;
    public function update(Category $category): void;
    public function delete(CategoryId $id): void;
}

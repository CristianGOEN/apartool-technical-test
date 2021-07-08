<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Domain;

use Apartool\Shared\Domain\Collection;

final class Categories extends Collection
{
    protected function type(): string
    {
        return Category::class;
    }
}

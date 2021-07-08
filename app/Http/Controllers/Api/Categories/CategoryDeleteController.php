<?php

namespace App\Http\Controllers\Api\Categories;

use Apartool\Estate\Categories\Application\Delete\CategoryDeleter;
use Apartool\Shared\Domain\Categories\CategoryId;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

final class CategoryDeleteController extends Controller
{
    public function __construct(private CategoryDeleter $deleter)
    {
    }

    public function __invoke(string $id): Response
    {
        $this->deleter->__invoke(new CategoryId($id));

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}

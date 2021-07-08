<?php

namespace App\Http\Controllers\Api\ApartmentsCategories;

use Apartool\Estate\ApartmentsCategories\Application\Delete\ApartmentCategoryDeleter;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

final class ApartmentCategoryDeleteController extends Controller
{
    public function __construct(private ApartmentCategoryDeleter $deleter)
    {
    }

    public function __invoke(string $apartmentId, string $categoryId): Response
    {
        $this->deleter->__invoke(new ApartmentId($apartmentId), new CategoryId($categoryId));

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}

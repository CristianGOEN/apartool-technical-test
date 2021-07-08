<?php

namespace App\Http\Controllers\Api\ApartmentsCategories;

use Apartool\Estate\ApartmentsCategories\Application\Find\ApartmentCategoryFinderAll;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApartmentCategoryGetController extends Controller
{
    public function __construct(private ApartmentCategoryFinderAll $finder)
    {
    }

    public function __invoke(string $string): JsonResponse
    {
        $apartmentsCategoriesResponse = $this->finder->__invoke(new ApartmentId($string));

        return new JsonResponse($apartmentsCategoriesResponse->apartmentsCategories(), Response::HTTP_OK, ['Access-Control-Allow-Origin' => '*']);
    }
}

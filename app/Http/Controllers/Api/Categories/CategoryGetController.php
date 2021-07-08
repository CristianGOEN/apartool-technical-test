<?php

namespace App\Http\Controllers\Api\Categories;

use Apartool\Estate\Categories\Application\Find\CategoryFinderAll;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryGetController extends Controller
{
    public function __construct(private CategoryFinderAll $finder)
    {
    }

    public function __invoke(): JsonResponse
    {
        $categoriesResponse = $this->finder->__invoke();

        return new JsonResponse($categoriesResponse->categories(), Response::HTTP_OK, ['Access-Control-Allow-Origin' => '*']);
    }
}

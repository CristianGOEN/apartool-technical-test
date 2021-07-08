<?php

namespace App\Http\Controllers\Api\ApartmentsCategories;

use Apartool\Estate\ApartmentsCategories\Application\Create\ApartmentCategoryCreator;
use Apartool\Estate\ApartmentsCategories\Application\Create\CreateApartmentCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ApartmentCategoryPostController extends Controller
{
    public function __construct(private ApartmentCategoryCreator $creator)
    {
    }

    public function __invoke(string $apartmentId, Request $request): Response
    {
        $this->creator->__invoke(
            new CreateApartmentCategoryRequest(
                $apartmentId,
                $request->get('categoryId')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}

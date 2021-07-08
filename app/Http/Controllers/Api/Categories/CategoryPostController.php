<?php

namespace App\Http\Controllers\Api\Categories;

use Apartool\Estate\Categories\Application\Create\CategoryCreator;
use Apartool\Estate\Categories\Application\Create\CreateCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class CategoryPostController extends Controller
{
    public function __construct(private CategoryCreator $creator)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->creator->__invoke(
            new CreateCategoryRequest(
                $request->get('id'),
                $request->get('title'),
                $request->get('description'),
                $request->get('active'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}

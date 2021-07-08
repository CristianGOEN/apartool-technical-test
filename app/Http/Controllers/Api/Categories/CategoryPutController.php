<?php

namespace App\Http\Controllers\Api\Categories;

use Apartool\Estate\Categories\Application\Update\CategoryUpdater;
use Apartool\Estate\Categories\Application\Update\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

final class CategoryPutController extends Controller
{
    public function __construct(private CategoryUpdater $updater)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->updater->__invoke(
            new UpdateCategoryRequest(
                $request->get('id'),
                $request->get('title'),
                $request->get('description'),
                $request->get('active'),
            )
        );

        return new Response('', Response::HTTP_OK);
    }
}

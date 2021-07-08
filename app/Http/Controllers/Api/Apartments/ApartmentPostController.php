<?php

namespace App\Http\Controllers\Api\Apartments;

use Apartool\Estate\Apartments\Application\Create\ApartmentCreator;
use Apartool\Estate\Apartments\Application\Create\CreateApartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ApartmentPostController extends Controller
{
    public function __construct(private ApartmentCreator $creator)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->creator->__invoke(
            new CreateApartmentRequest(
                $request->get('id'),
                $request->get('name'),
                $request->get('description'),
                $request->get('quantity'),
                $request->get('active'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}

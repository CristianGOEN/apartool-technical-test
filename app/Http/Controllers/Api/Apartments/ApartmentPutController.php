<?php

namespace App\Http\Controllers\Api\Apartments;

use Apartool\Estate\Apartments\Application\Update\ApartmentUpdater;
use Apartool\Estate\Apartments\Application\Update\UpdateApartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

final class ApartmentPutController extends Controller
{
    public function __construct(private ApartmentUpdater $updater)
    {
    }

    public function __invoke(Request $request): Response
    {
        $this->updater->__invoke(
            new UpdateApartmentRequest(
                $request->get('id'),
                $request->get('name'),
                $request->get('description'),
                $request->get('quantity'),
                $request->get('active'),
            )
        );

        return new Response('', Response::HTTP_OK);
    }
}

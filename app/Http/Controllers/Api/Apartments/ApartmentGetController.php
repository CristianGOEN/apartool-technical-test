<?php

namespace App\Http\Controllers\Api\Apartments;

use Apartool\Estate\Apartments\Application\Find\ApartmentFinderAll;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApartmentGetController extends Controller
{
    public function __construct(private ApartmentFinderAll $finder)
    {
    }

    public function __invoke(): JsonResponse
    {
        $apartmentsResponse = $this->finder->__invoke();

        return new JsonResponse($apartmentsResponse->apartments(), Response::HTTP_OK, ['Access-Control-Allow-Origin' => '*']);
    }
}

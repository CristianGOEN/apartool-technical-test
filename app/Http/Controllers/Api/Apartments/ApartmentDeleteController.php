<?php

namespace App\Http\Controllers\Api\Apartments;

use Apartool\Estate\Apartments\Application\Delete\ApartmentDeleter;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

final class ApartmentDeleteController extends Controller
{
    public function __construct(private ApartmentDeleter $deleter)
    {
    }

    public function __invoke(string $id): Response
    {
        $this->deleter->__invoke(new ApartmentId($id));

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}

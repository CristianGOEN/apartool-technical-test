<?php

declare(strict_types=1);

namespace Apartool\Estate\Apartments\Infrastructure;

use Apartool\Estate\Apartments\Domain\Apartment;
use Apartool\Estate\Apartments\Domain\ApartmentActive;
use Apartool\Estate\Apartments\Domain\ApartmentDescription;
use Apartool\Estate\Apartments\Domain\ApartmentName;
use Apartool\Estate\Apartments\Domain\ApartmentQuantity;
use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Estate\Apartments\Domain\Apartments;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use App\Models\ApartmentEloquentModel;

final class EloquentApartmentRepository implements ApartmentRepository
{
    public function save(Apartment $apartment): void
    {
        $model = new ApartmentEloquentModel();

        $model->id = $apartment->id()->value();
        $model->name = $apartment->name()->value();
        $model->description = $apartment->description()->value();
        $model->quantity = $apartment->quantity()->value();
        $model->active = $apartment->active()->value();
        $model->updated_at = $apartment->updatedOn();
        $model->created_at = $apartment->createdOn();

        $model->save();
    }

    public function search(ApartmentId $id): ?Apartment
    {
        $model = ApartmentEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new Apartment(
            new ApartmentId($model->id),
            new ApartmentName($model->name),
            new ApartmentDescription($model->description),
            new ApartmentQuantity($model->quantity),
            new ApartmentActive($model->active),
        );
    }

    public function searchAll(): ?Apartments
    {
        $models = ApartmentEloquentModel::paginate();

        if (null === $models) {
            return null;
        }

        $apartments = [];
        foreach ($models as $model) {
            array_push($apartments, new Apartment(
                new ApartmentId($model->id),
                new ApartmentName($model->name),
                new ApartmentDescription($model->description),
                new ApartmentQuantity($model->quantity),
                new ApartmentActive($model->active),
            ));
        }

        return new Apartments($apartments);
    }

    public function update(Apartment $apartment): void
    {
        $model = ApartmentEloquentModel::find($apartment->id()->value());

        $model->name = $apartment->name()->value();
        $model->description = $apartment->description()->value();
        $model->quantity = $apartment->quantity()->value();
        $model->active = $apartment->active()->value();
        $model->update();
    }

    public function delete(ApartmentId $id): void
    {
        $model = ApartmentEloquentModel::find($id->value());
        $model->delete();
    }
}

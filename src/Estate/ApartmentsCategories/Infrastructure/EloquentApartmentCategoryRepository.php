<?php

declare(strict_types=1);

namespace Apartool\Estate\ApartmentsCategories\Infrastructure;

use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategory;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentsCategories;
use Apartool\Shared\Domain\Apartments\ApartmentId;
use Apartool\Shared\Domain\Categories\CategoryId;
use App\Models\ApartmentCategoryEloquentModel;

final class EloquentApartmentCategoryRepository implements ApartmentCategoryRepository
{
    public function save(ApartmentCategory $apartmentCategory): void
    {
        $model = new ApartmentCategoryEloquentModel();

        $model->apartment_id = $apartmentCategory->apartmentId();
        $model->category_id = $apartmentCategory->categoryId();

        $model->save();
    }

    public function search(ApartmentId $apartmentId, CategoryId $categoryId): ?ApartmentCategory
    {
        $model = ApartmentCategoryEloquentModel::firstWhere([['apartment_id', $apartmentId], ['category_id', $categoryId]]);

        if (null === $model) {
            return null;
        }

        return new ApartmentCategory(
            new ApartmentId($model->apartment_id),
            new CategoryId($model->category_id)
        );
    }

    public function searchAll(ApartmentId $apartmentId): ?ApartmentsCategories
    {
        $models = ApartmentCategoryEloquentModel::where('apartment_id', $apartmentId)->paginate();

        if (null === $models) {
            return null;
        }

        $apartmentsCategories = [];
        foreach ($models as $model) {
            array_push($apartmentsCategories, new ApartmentCategory(
                new ApartmentId($model->apartment_id),
                new CategoryId($model->category_id)
            ));
        }

        return new ApartmentsCategories($apartmentsCategories);
    }

    public function delete(ApartmentId $apartmentId, CategoryId $categoryId): void
    {
        $model = ApartmentCategoryEloquentModel::firstWhere([['apartment_id', $apartmentId], ['category_id', $categoryId]]);
        $model->delete();
    }
}

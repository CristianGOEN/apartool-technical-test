<?php

declare(strict_types=1);

namespace Apartool\Estate\Categories\Infrastructure;

use Apartool\Estate\Categories\Domain\Categories;
use Apartool\Estate\Categories\Domain\Category;
use Apartool\Estate\Categories\Domain\CategoryActive;
use Apartool\Estate\Categories\Domain\CategoryDescription;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Estate\Categories\Domain\CategoryTitle;
use Apartool\Shared\Domain\Categories\CategoryId;
use App\Models\CategoryEloquentModel;

final class EloquentCategoryRepository implements CategoryRepository
{
    public function save(Category $category): void
    {
        $model = new CategoryEloquentModel();

        $model->id = $category->id()->value();
        $model->title = $category->title()->value();
        $model->description = $category->description()->value();
        $model->active = $category->active()->value();
        $model->updated_at = $category->updatedOn();
        $model->created_at = $category->createdOn();

        $model->save();
    }

    public function search(CategoryId $id): ?Category
    {
        $model = CategoryEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new Category(
            new CategoryId($model->id),
            new CategoryTitle($model->title),
            new CategoryDescription($model->description),
            new CategoryActive($model->active),
        );
    }

    public function searchAll(): ?Categories
    {
        $models = CategoryEloquentModel::paginate();

        if (null === $models) {
            return null;
        }

        $categories = [];
        foreach ($models as $model) {
            array_push($categories, new Category(
                new CategoryId($model->id),
                new CategoryTitle($model->title),
                new CategoryDescription($model->description),
                new CategoryActive($model->active),
            ));
        }

        return new Categories($categories);
    }

    public function update(Category $category): void
    {
        $model = CategoryEloquentModel::find($category->id()->value());
        $model->title = $category->title()->value();
        $model->description = $category->description()->value();
        $model->active = $category->active()->value();
        $model->update();
    }

    public function delete(CategoryId $id): void
    {
        $model = CategoryEloquentModel::find($id->value());
        $model->delete();
    }
}

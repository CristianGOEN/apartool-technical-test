<?php

namespace Database\Factories;

use App\Models\ApartmentCategoryEloquentModel;
use App\Models\ApartmentEloquentModel;
use App\Models\CategoryEloquentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentCategoryEloquentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApartmentCategoryEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apartment_id' => ApartmentEloquentModel::all(['id'])->random(),
            'category_id' => CategoryEloquentModel::all(['id'])->random()
        ];
    }
}

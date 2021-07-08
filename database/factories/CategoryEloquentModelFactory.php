<?php

namespace Database\Factories;

use App\Models\CategoryEloquentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryEloquentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'title' => $this->faker->name,
            'description' => $this->faker->paragraph(2),
            'active' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ApartmentEloquentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentEloquentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApartmentEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(2),
            'quantity' => $this->faker->numberBetween(1,10),
            'active' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

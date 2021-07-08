<?php

namespace Database\Seeders;

use App\Models\ApartmentCategoryEloquentModel;
use App\Models\ApartmentEloquentModel;
use Illuminate\Database\Seeder;

class ApartmentsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApartmentCategoryEloquentModel::factory()
            ->count(12)
            ->create();
    }
}

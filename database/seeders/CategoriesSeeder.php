<?php

namespace Database\Seeders;

use App\Models\CategoryEloquentModel;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryEloquentModel::factory()
            ->count(5)
            ->create();
    }
}

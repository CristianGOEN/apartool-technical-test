<?php

namespace Database\Seeders;

use App\Models\ApartmentEloquentModel;
use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApartmentEloquentModel::factory()
            ->count(10)
            ->create();
    }
}

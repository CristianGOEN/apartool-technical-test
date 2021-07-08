<?php

namespace App\Providers;

use Apartool\Estate\Apartments\Domain\ApartmentRepository;
use Apartool\Estate\Apartments\Infrastructure\EloquentApartmentRepository;
use Apartool\Estate\ApartmentsCategories\Domain\ApartmentCategoryRepository;
use Apartool\Estate\ApartmentsCategories\Infrastructure\EloquentApartmentCategoryRepository;
use Apartool\Estate\Categories\Domain\CategoryRepository;
use Apartool\Estate\Categories\Infrastructure\EloquentCategoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ApartmentRepository::class,
            EloquentApartmentRepository::class
        );

        $this->app->bind(
            CategoryRepository::class,
            EloquentCategoryRepository::class
        );

        $this->app->bind(
            ApartmentCategoryRepository::class,
            EloquentApartmentCategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

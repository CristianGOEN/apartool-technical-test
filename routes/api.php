<?php

use App\Http\Controllers\Api\Apartments\ApartmentDeleteController;
use App\Http\Controllers\Api\Apartments\ApartmentGetController;
use App\Http\Controllers\Api\Apartments\ApartmentPostController;
use App\Http\Controllers\Api\Apartments\ApartmentPutController;
use App\Http\Controllers\Api\ApartmentsCategories\ApartmentCategoryDeleteController;
use App\Http\Controllers\Api\ApartmentsCategories\ApartmentCategoryGetController;
use App\Http\Controllers\Api\ApartmentsCategories\ApartmentCategoryPostController;
use App\Http\Controllers\Api\Categories\CategoryDeleteController;
use App\Http\Controllers\Api\Categories\CategoryGetController;
use App\Http\Controllers\Api\Categories\CategoryPostController;
use App\Http\Controllers\Api\Categories\CategoryPutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/apartments', ApartmentGetController::class);
Route::post('/apartments', ApartmentPostController::class);
Route::put('/apartments', ApartmentPutController::class);
Route::delete('/apartments/{id}', ApartmentDeleteController::class);

Route::get('/categories', CategoryGetController::class);
Route::post('/categories', CategoryPostController::class);
Route::put('/categories', CategoryPutController::class);
Route::delete('/categories/{id}', CategoryDeleteController::class);

Route::get('/apartments/{apartmentId}/categories', ApartmentCategoryGetController::class);
Route::post('/apartments/{apartmentId}/categories', ApartmentCategoryPostController::class);
Route::delete('/apartments/{apartmentId}/categories/{categoryId}', ApartmentCategoryDeleteController::class);

<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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


Route::group(['prefix' => 'cities'], function () {
    Route::get('', [CityController::class, 'get_all_cities']);
    Route::post('/create', [CityController::class, 'create_city']);
    Route::put('/{id}/update', [CityController::class, 'update_city']);
    Route::delete('/{id}/delete', [CityController::class, 'delete_city']);
});

Route::group(['prefix' => 'shops'], function () {
    Route::get('', [ShopController::class, 'get_all_shops']);
    Route::post('/create', [ShopController::class, 'create_shop']);
    Route::put('/{id}/update', [ShopController::class, 'update_shop']);
    Route::delete('/{id}/delete', [ShopController::class, 'delete_shop']);
    Route::post('/{id}/add', [ShopController::class, 'add_product']);
    Route::get('/{id}/products', [ShopController::class, 'get_products']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('', [ProductController::class, 'get_all_products']);
    Route::post('/create', [ProductController::class, 'create_product']);
    Route::put('/{id}/update', [ProductController::class, 'update_product']);
    Route::delete('/{id}/delete', [ProductController::class, 'delete_product']);
});


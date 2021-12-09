<?php

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

//AUTH
Route::post('register', [App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\RegisterController::class, 'login']);
Route::middleware('auth:api')
    ->post('logout', [App\Http\Controllers\API\RegisterController::class, 'logout']);

//PRODUCTOS
Route::get('/allproducts/', [App\Http\Controllers\API\ProductoController::class, 'allArticles']);
Route::get('/someproducts/', [App\Http\Controllers\API\ProductoController::class, 'someArticles']);
Route::get('/image/', [App\Http\Controllers\API\ProductoController::class, 'getImage']);
Route::get('/category/products/{id}', [App\Http\Controllers\API\ProductoController::class, 'getByCategories']);

//CATEGORIAS
Route::get('/allcategories/', [App\Http\Controllers\API\CategoriaController::class, 'allCategories']);
Route::get('/somecategories/', [App\Http\Controllers\API\CategoriaController::class, 'someCategories']);
Route::get('/category/{id}', [App\Http\Controllers\API\CategoriaController::class, 'getCategoryXsub']);
Route::get('/category/subcategory/{id}', [App\Http\Controllers\API\CategoriaController::class, 'getSomeSubcat']);
Route::get('/allsubcateg/', [App\Http\Controllers\API\CategoriaController::class, 'getAllSubCat']);

//CARRITO
Route::get('/cliente/', [App\Http\Controllers\API\CarritoController::class, 'getclienteAuth']);
Route::get('/carritoclient/{cliente}', [App\Http\Controllers\API\CarritoController::class, 'getCarritoAuth']);


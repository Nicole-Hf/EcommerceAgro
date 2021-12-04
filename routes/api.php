<?php

//use App\Http\Controllers\API\RegisterController;
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

Route::post('register', [App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\RegisterController::class, 'login']);
Route::middleware('auth:api')
    ->post('logout', [App\Http\Controllers\API\RegisterController::class, 'logout']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/allproducts/', [App\Http\Controllers\API\ProductoController::class, 'allArticles']);
Route::get('/someproducts/', [App\Http\Controllers\API\ProductoController::class, 'someArticles']);
Route::get('/allcategories/', [App\Http\Controllers\API\ProductoController::class, 'allCategories']);
Route::get('/image/', [App\Http\Controllers\API\ProductoController::class, 'getImage']);
Route::get('/category/subcategory/{id}', [App\Http\Controllers\API\ProductoController::class, 'getSubcategories']);
Route::get('/category/products/{id}', [App\Http\Controllers\API\ProductoController::class, 'getArticlesxCat']);
Route::get('/category/{id}', [App\Http\Controllers\API\ProductoController::class, 'getCategoryXsub']);



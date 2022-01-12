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
Route::post('register',
    [App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('login',
    [App\Http\Controllers\API\RegisterController::class, 'login']);
Route::middleware('auth:api')
    ->post('logout',
        [App\Http\Controllers\API\RegisterController::class, 'logout']);

//PRODUCTOS
Route::get('/allproducts/{wishlist}',
    [App\Http\Controllers\API\ProductoController::class, 'allArticles']);
Route::get('/someproducts/{wishlist}',
    [App\Http\Controllers\API\ProductoController::class, 'someArticles']);
Route::get('/category/products/{id}',
    [App\Http\Controllers\API\ProductoController::class, 'getByCategories']);

//CATEGORIAS
Route::get('/allcategories/',
    [App\Http\Controllers\API\CategoriaController::class, 'allCategories']);
Route::get('/somecategories/',
    [App\Http\Controllers\API\CategoriaController::class, 'someCategories']);
Route::get('/category/{id}',
    [App\Http\Controllers\API\CategoriaController::class, 'getCategoryXsub']);
Route::get('/category/subcategory/{id}',
    [App\Http\Controllers\API\CategoriaController::class, 'getSomeSubcat']);
Route::get('/allsubcateg/',
    [App\Http\Controllers\API\CategoriaController::class, 'getAllSubCat']);

//CARRITO
Route::get('/cartproduct/{cart}',
    [App\Http\Controllers\API\CarritoController::class, 'getCartProduct']);
Route::post('/cartproduct/store',
    [App\Http\Controllers\API\CarritoController::class, 'addProduct']);
Route::post('/cartproduct/destroy',
    [App\Http\Controllers\API\CarritoController::class, 'deleteProduct']);
Route::post('/cartproduct/remove',
    [App\Http\Controllers\API\CarritoController::class, 'removeProduct']);
Route::get('/getTotalCart/{cart}',
    [App\Http\Controllers\API\CarritoController::class, 'getTotal']);
Route::post('/create/cart',
    [App\Http\Controllers\API\EnvioController::class, 'createCart']);

//LISTA DE DESEOS
Route::post('/wishlist/add' ,
    [App\Http\Controllers\API\WishListController::class, 'addProductToList']);
Route::get('/wishlist/{wishlist}',
    [App\Http\Controllers\API\WishListController::class, 'index']);
Route::post('/wishlist/exist' ,
    [App\Http\Controllers\API\WishListController::class, 'inList']);
Route::post('/wishlist/destroy',
    [App\Http\Controllers\API\WishListController::class, 'deleteProduct']);

//PEDIDO
Route::post('/envio/store',
    [App\Http\Controllers\API\EnvioController::class, 'createEnvio']);
Route::get('/creditcards/{cliente}',
    [App\Http\Controllers\API\EnvioController::class, 'getTarjetas']);
Route::post('/factura/store',
    [App\Http\Controllers\API\EnvioController::class, 'createFactura']);
Route::get('/factura/{idcliente}',
    [App\Http\Controllers\API\EnvioController::class, 'getFacturas']);
Route::get('/facturaItems/{idcliente}',
    [App\Http\Controllers\API\EnvioController::class, 'getFacturasItems']);
Route::get('/getinvoice/{cliente}',
    [App\Http\Controllers\API\EnvioController::class, 'facturaItems']);

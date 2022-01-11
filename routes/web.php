<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleBitacoraController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//AUTH
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//RESETEAR PASSWORD
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

//CARRITO
Route::POST('/carrito', [App\Http\Controllers\CartController::class, 'addToCart'])
    ->name('carrito.add');
Route::get('/carrito/estado', [App\Http\Controllers\CartController::class, 'index'])
    ->name('carrito.estado');
Route::POST('/carrito/eliminar', [App\Http\Controllers\CartController::class, 'remove'])
    ->name('carrito.eliminar');
Route::POST('/carrito/updateItem', [App\Http\Controllers\CartController::class, 'actualizarItemCarrito'])
    ->name('carrito.updateItem');

//WISHLIST
Route::POST('/wishList', [App\Http\Controllers\WishListController::class, 'addTowishList'])
    ->name('ListaDeDeseos.add');
Route::get('/wishList/ListaDeDeseos', [App\Http\Controllers\WishListController::class, 'index'])
    ->name('Catalogo.ListaDeDeseos');
Route::POST('/wishList/eliminar', [App\Http\Controllers\WishListController::class, 'remove'])
    ->name('ListaDeDeseos.eliminar');
Route::POST('/wishList/updateItem', [App\Http\Controllers\WishListController::class, 'actualizarItemWishList'])
    ->name('ListaDeDeseos.updateItem');


Route::middleware(['auth'])->group(function () {
    //usuarios
    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])
            ->name('users.index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])
            ->name('users.create');
        Route::post('/', [App\Http\Controllers\UserController::class, 'store'])
            ->name('users.store');
        Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
            ->name('users.delete');
        Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])
            ->name('users.edit');
        Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])
            ->name('users.update');
    });

    //roles
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/index', [App\Http\Controllers\RoleController::class, 'index'])
            ->name('roles.index');
        Route::get('/create', [App\Http\Controllers\RoleController::class, 'create'])
            ->name('roles.create');
        Route::get('/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])
            ->name('roles.edit');
        Route::put('/{role}', [App\Http\Controllers\RoleController::class, 'update'])
            ->name('roles.update');
        Route::delete('/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])
            ->name('roles.delete');
        Route::post('/', [App\Http\Controllers\RoleController::class, 'store'])
            ->name('roles.store');
    });

    //clientes
    Route::group(['prefix' => 'clientes'], function () {
        Route::get('/index', [App\Http\Controllers\ClienteController::class, 'index'])
            ->name('clientes.index');
        Route::get('/create', [App\Http\Controllers\ClienteController::class, 'create'])
            ->name('clientes.create');
        Route::get('/show', [App\Http\Controllers\ClienteController::class, 'show'])
            ->name('clientes.show');
        Route::get('/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])
            ->name('clientes.edit');
        Route::put('/{id}', [App\Http\Controllers\ClienteController::class, 'update'])
            ->name('clientes.update');
        Route::delete('/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])
            ->name('clientes.delete');
        Route::post('/', [App\Http\Controllers\ClienteController::class, 'store'])
            ->name('clientes.store');
    });

    //categorias
    Route::group(['prefix' => 'categorias'], function () {
        Route::get('/index', [App\Http\Controllers\CategoriaController::class, 'index'])
            ->name('categorias.index');
        Route::get('/create', [App\Http\Controllers\CategoriaController::class, 'create'])
            ->name('categorias.create');
        Route::get('/{categoria}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])
            ->name('categorias.edit');
        Route::put('/{categoria}', [App\Http\Controllers\CategoriaController::class, 'update'])
            ->name('categorias.update');
        Route::delete('/{categoria}', [App\Http\Controllers\CategoriaController::class, 'destroy'])
            ->name('categorias.delete');
        Route::post('/', [App\Http\Controllers\CategoriaController::class, 'store'])
            ->name('categorias.store');

        //subcategorias
        Route::group(['prefix' => 'subcategorias'], function () {
            Route::get('/index', [App\Http\Controllers\SubcategoriaController::class, 'index'])
                ->name('subcategorias.index');
            Route::get('/create', [App\Http\Controllers\SubcategoriaController::class, 'create'])
                ->name('subcategorias.create');
            Route::get('/{subcategoria}/edit', [App\Http\Controllers\SubcategoriaController::class, 'edit'])
                ->name('subcategorias.edit');
            Route::put('/{subcategoria}', [App\Http\Controllers\SubcategoriaController::class, 'update'])
                ->name('subcategorias.update');
            Route::delete('/{subcategoria}', [App\Http\Controllers\SubcategoriaController::class, 'destroy'])
                ->name('subcategorias.delete');
            Route::post('/', [App\Http\Controllers\SubcategoriaController::class, 'store'])
                ->name('subcategorias.store');
        });
    });

    //empresas
    Route::group(['prefix' => 'empresas'], function () {
        Route::get('/index', [App\Http\Controllers\EmpresaController::class, 'index'])
            ->name('empresas.index');
        Route::get('/create', [App\Http\Controllers\EmpresaController::class, 'create'])
            ->name('empresas.create');
        Route::post('/', [App\Http\Controllers\EmpresaController::class, 'store'])
            ->name('empresas.store');
    });

    //productos
    Route::group(['prefix' => 'productos'], function () {
        Route::get('/index', [ProductoController::class, 'index'])
            ->name('productos.index');
        Route::get('/admin-index', [ProductoController::class, 'indexAdmin'])
            ->name('productos.indexAdmin');
        Route::get('/create', [ProductoController::class, 'create'])
            ->name('productos.create');
        Route::post('/store', [ProductoController::class, 'store'])
            ->name('productos.store');
        Route::get('/edit/{producto}', [ProductoController::class, 'edit'])
            ->name('productos.edit');
        Route::post('/update/{producto}', [ProductoController::class, 'update'])
            ->name('productos.update');
        Route::delete('/delete/{producto}', [ProductoController::class, 'destroy'])
            ->name('productos.delete');
        Route::get('/{producto}', [ProductoController::class, 'show'])
            ->name('productos.show');
        Route::post('/subcategorias', [ProductoController::class, 'subcategorias']);
    });

    //tarjetas
    Route::group(['prefix'=> 'payment'],function(){
        Route::get('/index',[TarjetaController::class,'index'])->name('tarjeta.index');
        Route::get('/create',[TarjetaController::class,'create'])->name('tarjeta.create');
        Route::post('/store',[TarjetaController::class,'store'])->name('tarjeta.store');
        Route::delete('/delete/{tarjeta}',[TarjetaController::class,'delete'])->name('tarjeta.delete');
    });

    //pedido
    Route::group(['prefix'=>'pedido'],function(){
        Route::get('/index',[PedidoController::class,'index'])->name('pedido.index');
        Route::post('/store/{carrito}',[PedidoController::class,'store'])->name('pedido.store');
    });
});

Auth::routes();

//LOGIN ROUTES
Route::get('/empresa/home', [App\Http\Controllers\HomeController::class, 'indexEmp'])
    ->name('home');
Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])
    ->name('catalogo');
Route::get('/mostrar/{id}', 'App\Http\Controllers\ShopController@mostrar')
    ->name('mostrar');
Route::get('/product/{id}', 'App\Http\Controllers\ShopController@ver')
    ->name('ver');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'indexAdmin'])
    ->name('home.admin');
Route::get('/index',[BitacoraController::class,'index'])->name('Bitacora.index');
Route::get('/show/{correo}',[DetalleBitacoraController::class,'show'])->name('detallebitacora.show');

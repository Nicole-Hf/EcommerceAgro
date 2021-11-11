<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
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


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//PROBANDO GMAIL
Route::get('/send-email', [MailController::class, 'sendEmail']);
///


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

///para gmail
//Route::get('/password.reset', function () {
//  return view('auth.ResetPassword');
//})->name('password.update');





Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //usuarios
    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])
            ->name('users.index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])
            ->name('users.create');
        Route::get('/{id}', [App\Http\Controllers\UserController::class, 'show'])
            ->name('users.show');
        Route::get('/{role}/edit', [App\Http\Controllers\UserController::class, 'edit'])
            ->name('users.edit');
        Route::put('/{role}', [App\Http\Controllers\UserController::class, 'update'])
            ->name('users.update');
        Route::delete('/{role}', [App\Http\Controllers\UserController::class, 'destroy'])
            ->name('users.delete');
        Route::post('/', [App\Http\Controllers\UserController::class, 'store'])
            ->name('users.store');
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
        Route::get('/{id}', [App\Http\Controllers\ClienteController::class, 'show'])
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
        Route::get('/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])
            ->name('categorias.show');
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
            Route::get('/{id}', [App\Http\Controllers\SubcategoriaController::class, 'show'])
                ->name('subcategorias.show');
            Route::get('/{id}/edit', [App\Http\Controllers\SubcategoriaController::class, 'edit'])
                ->name('subcategorias.edit');
            Route::put('/{id}', [App\Http\Controllers\SubcategoriaController::class, 'update'])
                ->name('subcategorias.update');
            Route::delete('/{id}', [App\Http\Controllers\SubcategoriaController::class, 'destroy'])
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
        Route::get('/{id}', [App\Http\Controllers\EmpresaController::class, 'show'])
            ->name('empresas.show');
        Route::get('/{id}/edit', [App\Http\Controllers\EmpresaController::class, 'edit'])
            ->name('empresas.edit');
        Route::put('/{id}', [App\Http\Controllers\EmpresaController::class, 'update'])
            ->name('empresas.update');
        Route::delete('/{id}', [App\Http\Controllers\EmpresaController::class, 'destroy'])
            ->name('empresas.delete');
        Route::post('/', [App\Http\Controllers\EmpresaController::class, 'store'])
            ->name('empresas.store');
    });
});
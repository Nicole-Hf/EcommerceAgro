<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/login', function () {
   return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/principal', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'users'], function () {
   Route::get
   ('/index',[App\Http\Controllers\UserController::class,'index'])
       ->name('users.index');
    Route::get
    ('/create', [App\Http\Controllers\UserController::class, 'create'])
        ->name('users.create');
    Route::get
    ('/{id}', [App\Http\Controllers\UserController::class, 'show'])
        ->name('users.show');
    Route::get
    ('/{role}/edit', [App\Http\Controllers\UserController::class, 'edit'])
        ->name('users.edit');
    Route::put
    ('/{role}', [App\Http\Controllers\UserController::class, 'update'])
        ->name('users.update');
    Route::delete
    ('/{role}', [App\Http\Controllers\UserController::class, 'destroy'])
        ->name('users.delete');
    Route::post
    ('/', [App\Http\Controllers\UserController::class, 'store'])
        ->name('users.store');
});

Route::group(['prefix' => 'roles'], function () {
   Route::get
   ('/index', [App\Http\Controllers\RoleController::class, 'index'])
       ->name('roles.index');
   Route::get
   ('/create', [App\Http\Controllers\RoleController::class, 'create'])
       ->name('roles.create');
    Route::get
    ('/{id}', [App\Http\Controllers\RoleController::class, 'show'])
        ->name('roles.show');
    Route::get
    ('/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])
        ->name('roles.edit');
    Route::put
    ('/{role}', [App\Http\Controllers\RoleController::class, 'update'])
        ->name('roles.update');
    Route::delete
    ('/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])
        ->name('roles.delete');
    Route::post
    ('/', [App\Http\Controllers\RoleController::class, 'store'])
        ->name('roles.store');
});

Route::group(['prefix' => 'clientes'], function () {
    Route::get
    ('/index', [App\Http\Controllers\ClienteController::class, 'index'])
        ->name('clientes.index');
    Route::get
    ('/create', [App\Http\Controllers\ClienteController::class, 'create'])
        ->name('clientes.create');
    Route::get
    ('/{id}', [App\Http\Controllers\ClienteController::class, 'show'])
        ->name('clientes.show');
    Route::get
    ('/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])
        ->name('clientes.edit');
    Route::put
    ('/{id}', [App\Http\Controllers\ClienteController::class, 'update'])
        ->name('clientes.update');
    Route::delete
    ('/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])
        ->name('clientes.delete');
    Route::post
    ('/', [App\Http\Controllers\ClienteController::class, 'store'])
        ->name('clientes.store');
});

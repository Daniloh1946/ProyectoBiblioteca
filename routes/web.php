<?php

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

Route::get('/', function () {
    return view('/home');
});

Route::get('colaboradore/pdf', [App\Http\Controllers\ColaboradoreController::class, 'PDF'])->name('colaboradores.pdf');


Auth::routes();
// Route::resource('Sucursales', App\Http\Controllers\SucursaleController::class);
Route::resource('colaboradores',App\Http\Controllers\ColaboradoreController::class)->middleware('auth') ;
Route::resource('sucursales',App\Http\Controllers\SucursaleController::class)-> middleware('auth');
Route::resource('revistas',App\Http\Controllers\RevistaController::class)-> middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

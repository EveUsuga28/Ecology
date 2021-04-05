<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PuntajeMaterialController;
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
    return view('./auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/material',MaterialController::class);

Route::resource('material',MaterialController::class);
Route::GET('/puntajeMaterial/Crear/{id}', [App\Http\Controllers\PuntajeMaterialController::class, 'Crear'])->name('puntajeMaterial.Crear');
Route::resource('puntajeMaterial',PuntajeMaterialController::class);






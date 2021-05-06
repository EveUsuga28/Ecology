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

use App\Http\Controllers\InstitucionsController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\NoticiasController;


Route::get('/', function () {
    return view('./auth/index');
});

Route::get('/login', function () {
    return view('./auth/login');
});

/* Rutas institucion */
Route::resource('institucion', InstitucionsController::class)->middleware('auth');/* el " ->middlware('auth');  " es de cuestion de seguridad para protejer rutas a aquellas personas que no estan logueadas*/
/*
Route::get('/institucion', function () { return view('./institucion/index'); });
Route::get('institucion/create',[InstitucionsController::class, 'create']);
*/


/* Fin rutas institucion */

/* Rutas grupo */
Route::resource('grupo', GruposController::class);
/* Fin rutas grupo */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/material',MaterialController::class);

Route::resource('material',MaterialController::class);

Route::GET('/puntajeMaterial/Crear/{id}', [App\Http\Controllers\PuntajeMaterialController::class, 'Crear'])->name('puntajeMaterial.Crear');

Route::resource('puntajeMaterial',PuntajeMaterialController::class);

Route::resource('/users',UserController::class);

Route::PUT('/users/{id}/Deshabilitar', [App\Http\Controllers\UserController::class, 'Deshabilitar'])->name('users.Deshabilitar');



Route::resource('noticias',NoticiasController::class);

Route::PUT('/noticias/{id_noticia}/Deshabilitar', [App\Http\Controllers\NoticiasController::class, 'Deshabilitar'])->name('noticias.Deshabilitar');



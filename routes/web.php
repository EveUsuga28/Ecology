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


Route::get('/', \App\Http\Controllers\publico::class);

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


/* Rutas Noticias */
Route::resource('noticias',NoticiasController::class);

Route::PUT('/noticias/{id}/Deshabilitar', [App\Http\Controllers\NoticiasController::class, 'Deshabilitar'])->name('noticias.Deshabilitar');

/* Fin Rutas Noticias */
Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/material',MaterialController::class);

Route::resource('material',MaterialController::class);

Route::GET('/puntajeMaterial/Crear/{id}', [App\Http\Controllers\PuntajeMaterialController::class, 'Crear'])->name('puntajeMaterial.Crear');

Route::resource('puntajeMaterial',PuntajeMaterialController::class);

Route::resource('/users',UserController::class);

Route::PUT('/users/{id}/Deshabilitar', [App\Http\Controllers\UserController::class, 'Deshabilitar'])->name('users.Deshabilitar');



//Route::get('/reciclaje',[\App\Http\Controllers\reciclajeIntitucionControlller::class,'index'])->name('reciclaje.index');
//Route::resource('noticias',NoticiasController::class);

//Route::PUT('/noticias/{id_noticia}/Deshabilitar', [App\Http\Controllers\NoticiasController::class, 'Deshabilitar'])->name('noticias.Deshabilitar');

Route::get('/reciclaje/crear',[\App\Http\Controllers\reciclajeIntitucionControlller::class,'crear'])->name('reciclaje.crear');

Route::get('/reciclaje/editarReciclaje/{id}',[\App\Http\Controllers\reciclajeIntitucionControlller::class,'editarReciclaje'])->name('reciclaje.Editar');

Route::resource('/reciclaje',\App\Http\Controllers\reciclajeIntitucionControlller::class)->names('reciclaje');

Route::get('/reciclajeGrupo/CrearDetalle/{id}',[\App\Http\Controllers\reciclajeGrupoController::class,'CrearDetalle'])->name('reciclajeGrupo.Crear');

Route::get('/reciclajeGrupo/EditarDetalle/{id}',[\App\Http\Controllers\reciclajeGrupoController::class,'EditarDetalle'])->name('reciclajeGrupo.Editar');

Route::resource('/reciclajeGrupo',\App\Http\Controllers\reciclajeGrupoController::class)->names('reciclajeGrupo');














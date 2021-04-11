<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PuntajeMaterialController;
<<<<<<< HEAD
use App\Http\Controllers\InstitucionsController;
=======
use App\Http\Controllers\NoticiasController;

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
>>>>>>> 6e5d58671b7f641992615c661afb3c7741b98145

Route::get('/', function () {
    return view('./auth/index');
});

Route::get('/login', function () {
    return view('./auth/login');
});

/* Rutas institucion */
/*
Route::get('/institucion', function () { return view('./institucion/index'); });
Route::get('institucion/create',[InstitucionsController::class, 'create']);
*/

Route::resource('institucion', InstitucionsController::class);
/* Fin rutas institucion */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('material',MaterialController::class);

Route::GET('/puntajeMaterial/Crear/{id}', [App\Http\Controllers\PuntajeMaterialController::class, 'Crear'])->name('puntajeMaterial.Crear');

Route::resource('puntajeMaterial',PuntajeMaterialController::class);

Route::resource('/users',UserController::class);

Route::PUT('/users/{id}/Deshabilitar', [App\Http\Controllers\UserController::class, 'Deshabilitar'])->name('users.Deshabilitar');

Route::resource('noticias',NoticiasController::class);

<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PuntajeMaterialController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PuntajeProductoController;
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
use App\Http\Controllers\PublicoController;


/*Route::get('/', function(){
    return view('./auth/index');
});*/

Route::get('/', [PublicoController::class, 'index']);

Route::get('/noticia/{id}',[PublicoController::class, 'vista'])->name('vista.noticia');

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
Route::PUT('/puntajeMaterial/{idPuntajeMaterail}/Deshabilitar', [App\Http\Controllers\PuntajeMaterialController::class, 'Deshabilitar'])->name('puntajeMaterial.Deshabilitar');

Route::resource('/users',UserController::class);

Route::PUT('/users/{id}/Deshabilitar', [App\Http\Controllers\UserController::class, 'Deshabilitar'])->name('users.Deshabilitar');

Route::PUT('/producto/{id}/Deshabilitar', [App\Http\Controllers\ProductoController::class, 'Deshabilitar'])->name('producto.Deshabilitar');

//Route::get('/reciclaje',[\App\Http\Controllers\reciclajeIntitucionControlller::class,'index'])->name('reciclaje.index');
//Route::resource('noticias',NoticiasController::class);
Route::resource('noticias',NoticiasController::class);

Route::PUT('/noticias/{id}/Deshabilitar', [App\Http\Controllers\NoticiasController::class, 'Deshabilitar'])->name('noticias.Deshabilitar');

Route::get('/reciclaje/crear',[App\Http\Controllers\reciclajeIntitucionControlller::class,'crear'])->name('reciclaje.crear');

Route::get('/reciclaje/editarReciclaje/{id}',[App\Http\Controllers\reciclajeIntitucionControlller::class,'editarReciclaje'])->name('reciclaje.Editar');

Route::resource('/reciclaje',App\Http\Controllers\reciclajeIntitucionControlller::class)->names('reciclaje');

Route::get('/reciclajeGrupo/indexMaterialesDetalle/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'indexMaterialesDetalle'])->name('reciclajeGrupo.indexMateriales');

Route::get('/reciclajeGrupo/indexProductosDetalle/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'indexProductoDetalle'])->name('reciclajeGrupo.indexProductos');

Route::post('/reciclajeGrupo/crearDetalle',[App\Http\Controllers\reciclajeGrupoController::class,'crearDetalleMateriales'])->name('reciclajeGrupo.crearDetalle');

Route::post('/reciclajeGrupo/crearDetalleProductos',[App\Http\Controllers\reciclajeGrupoController::class,'crearDetalleProductos'])->name('reciclajeGrupo.crearDetalleProductos');

Route::get('/reciclajeGrupo/deshabilitar/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'deshabilitar_habilitar'])->name('reciclajeGrupo.deshabilitarDetalle');

Route::get('/reciclajeGrupo/deshabilitarProducto/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'deshabilitar_habilitar_producto'])->name('reciclajeGrupo.deshabilitarDetalleProducto');

Route::get('/reciclajeGrupo/enviarEditarDetalleMaterial/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'enviarEditarDetalleMaterial'])->name('reciclajeGrupo.enviarEditarDetalleMaterial');

Route::get('/reciclajeGrupo/enviarEditarDetalleProducto/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'enviarEditarDetalleProducto'])->name('reciclajeGrupo.enviarEditarDetalleProducto');

Route::post('/reciclajeGrupo/ActualizarDetalleMaterial',[App\Http\Controllers\reciclajeGrupoController::class,'ActualizarDetalleMaterial'])->name('reciclajeGrupo.ActualizarDetalleMaterial');

Route::post('/reciclajeGrupo/ActualizarDetalleProducto',[App\Http\Controllers\reciclajeGrupoController::class,'ActualizarDetalleProducto'])->name('reciclajeGrupo.ActualizarDetalleMaterial');

Route::resource('/producto',ProductoController::class);

Route::get('/reciclajeGrupo/CrearDetalle/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'CrearDetalle'])->name('reciclajeGrupo.Crear');

Route::get('/reciclajeGrupo/EditarDetalle/{id}',[App\Http\Controllers\reciclajeGrupoController::class,'EditarDetalle'])->name('reciclajeGrupo.Editar');

Route::resource('/reciclajeGrupo',App\Http\Controllers\reciclajeGrupoController::class)->names('reciclajeGrupo');

Route::GET('/puntajeProducto/Crear/{id}', [App\Http\Controllers\PuntajeProductoController::class, 'Crear'])->name('puntajeProducto.Crear');
Route::resource('puntajeProducto',PuntajeProductoController::class);

Route::PUT('/puntajeProducto/{id}/Deshabilitar', [App\Http\Controllers\puntajeProductoController::class, 'Deshabilitar'])->name('puntajeProducto.Deshabilitar');
//Route::POST('/', [InformesController::class, 'all']);
Route::post('/informes/all',[App\Http\Controllers\InformesController::class,'all'])->name('informes.all');
//Route::post('/informes','App\Http\Controllers\InformesController@all');
Route::resource('informes',App\Http\Controllers\InformesController::class);










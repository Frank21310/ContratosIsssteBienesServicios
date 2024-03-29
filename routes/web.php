<?php

use App\Http\Controllers\AdminContratos\SoloAdminContratosController;
use App\Http\Controllers\Administrador\ClavesController;
use App\Http\Controllers\Administrador\EmpleadosController;
use App\Http\Controllers\Administrador\InsumoController;
use App\Http\Controllers\Administrador\ProveedoresController;
use App\Http\Controllers\Administrador\RolesController;
use App\Http\Controllers\Administrador\SoloAdminController;
use App\Http\Controllers\Administrador\UsuariosController;
use App\Http\Controllers\AreaNormativa\SoloAreaNormativaController;
use App\Http\Controllers\Contratante\ContratosController;
use App\Http\Controllers\Contratante\RequisicionesFinalizadasController;
use App\Http\Controllers\Contratante\RequisicionesSeguimientoController;
use App\Http\Controllers\Contratante\SoloContratanteController;
use App\Http\Controllers\Finanzas\SoloFinanzasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Requirente\InsumosController;
use App\Http\Controllers\Requirente\RequisicionesController;
use App\Http\Controllers\Requirente\SoloRequirenteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
|--------------------------------------------------------------------------
| Web Routes pages of Login and welcome home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Registro', function () {
    return view('auth.Registro');
})->name('Registro');

/*
|--------------------------------------------------------------------------
| Web Routes auth
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes Administrador
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Administrador', [SoloAdminController::class, 'index'])->name(' administrador');
    Route::resource('/Administrador/roles', RolesController::class);
    Route::resource('/Administrador/Empleados', EmpleadosController::class);
    Route::resource('/Administrador/Usuarios', UsuariosController::class);
    Route::resource('/Administrador/Proveedores', ProveedoresController::class);
    Route::get('/Administrador/Claves', [ClavesController::class, 'index'])->name('Claves.index');
    Route::post('/Administrador/procesar-archivo', [ClavesController::class, 'procesarArchivo'])->name('Claves.procesarArchivo');
})->namespace('root');
/*
|--------------------------------------------------------------------------
| Web Routes Peticiones
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Requirente', [SoloRequirenteController::class, 'index'])->name(' Peticiones');

    Route::get('/Requirente/Requisiciones/fclaveCucop', [RequisicionesController::class, 'fclaveCucop'])->name('fclaveCucop');

    Route::resource('/Requirente/Requisiciones', RequisicionesController::class);

    Route::get('/Requirente/Requisiciones/{id}/imprimir', [RequisicionesController::class, 'imprimirRequisicion'])->name('requisiciones.imprimir');


    Route::resource('Requirente/Insumos', InsumosController::class);
})->namespace('Requirente');
/*
|----------------------------------------------------------------- ---------
| Web Routes Contratante
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Contratante', [SoloContratanteController::class, 'index'])->name(' Contratante');

    Route::resource('/Contratante/SeguimientoRequisicion', RequisicionesSeguimientoController::class);
    Route::get('/Contratante/SeguimientoRequisicion/{id}/edit', [RequisicionesSeguimientoController::class, 'edit'])->name('SeguimientoRequisicion.edit');
    Route::put('/Contratante/SeguimientoRequisicion/{id}', [RequisicionesSeguimientoController::class, 'update'])->name('SeguimientoRequisicion.update');
    Route::put('/Contratante/SeguimientoRequisicion/{id}/tipo-contratacion', [RequisicionesSeguimientoController::class, 'updateTipoContratacion'])->name('SeguimientoRequisicion.updateTipoContratacion');
    Route::get('/descargar-archivos-requisicion/{id}', [RequisicionesSeguimientoController::class, 'descargarArchivosRequisicion'])->name('descargarArchivosRequisicion');

    Route::resource('/Contratante/RequisicionesFinalizadas', RequisicionesFinalizadasController::class);

    Route::get('/Contratante/contratos/index', [ContratosController::class, 'index'])->name('Contratos.index');
    Route::get('/Contratante/contratos/create/{requisicion_id}', [ContratosController::class, 'create'])->name('Contratos.create');
    Route::post('/Contratante/contratos/store', [ContratosController::class, 'store'])->name('Contratos.store');
    Route::post('/Contratante/contratos/proveedor', [ContratosController::class, 'proveedor'])->name('Contratos.proveedor');
    Route::get('/Contratante/contratos/{id}/imprimir', [ContratosController::class, 'imprimirContrato'])->name('Contratos.imprimir');
    Route::get('/Contratante/contratos/{id}/generar-word', [ContratosController::class, 'wordContrato'])->name('Contratos.word');
    Route::get('/contratos/export/excel', [ContratosController::class, 'exportExcel'])->name('contratos.export.excel');
    Route::get('/Contratos/contratos/obtener-informacion-proveedor/{proveedor}', [ContratosController::class, 'obtenerInformacionProveedor'])->name('obtenerInformacionProveedor');


})->namespace('Contratante');
/*
|----------------------------------------------------------------- ---------
| Web Routes AdminContratos
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {

    Route::get('/AdminContratos', [SoloAdminContratosController::class, 'index'])->name(' AdminContratos');
})->namespace('admincontratos');
/*
|----------------------------------------------------------------- ---------
| Web Routes Finanzas
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Finanzas', [SoloFinanzasController::class, 'index'])->name(' Finanzas');
})->namespace('Finanzas');
/*
|----------------------------------------------------------------- ---------
| Web Routes AreaNormatica
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Anormativa', [SoloAreaNormativaController::class, 'index'])->name(' Anormativa');
})->namespace('Anormativa');

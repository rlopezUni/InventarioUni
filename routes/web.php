<?php

use Illuminate\Support\Facades\Route;

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




Route::get('/', function () {
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Usuarios

    Route::get('/consulta_activos/','App\Http\Controllers\UsuariosController@index')->name('mostrar');
    Route::post('/consulta_activos/en_plantel','App\Http\Controllers\UsuariosController@mostrarPlanteles')->name('mostrarPlantelActivos');
    Route::post('/consulta_activos/en_plantel_area','App\Http\Controllers\UsuariosController@mostrarPlanteles_Areas')->name('mostrarPlantel_AreaActivos');



    //Activos

    Route::get('/activos/','App\Http\Controllers\ActivosController@index')->name('mostrarActivos');
    Route::get('/consulta/areas/{plantel}','App\Http\Controllers\ActivosController@consulta_areas')->name('consulta.areas'); //muestra las areas de ese plantel
    Route::post('/activos/','App\Http\Controllers\ActivosController@store')->name('storeActivos');
    Route::post('/activos/eliminar/{id}','App\Http\Controllers\ActivosController@eliminar')->name('eliminarActivos');
    Route::get('/activos/modificar/{id}','App\Http\Controllers\ActivosController@mostrarModificar')->name('mostrarModificarActivos');
    Route::post('/activos/modificar/{id}','App\Http\Controllers\ActivosController@modificar')->name('modificarActivos');
    Route::get('/activos/mover/{id}','App\Http\Controllers\ActivosController@mostrarMover')->name('mostrarMoverActivos');
    Route::post('/activos/mover/{id}','App\Http\Controllers\ActivosController@mover')->name('moverActivos');

    //Areas

    Route::get('/areas/','App\Http\Controllers\AreasController@index')->name('mostrarAreas');
    Route::post('/areas/','App\Http\Controllers\AreasController@store')->name('storeAreas');
    Route::post('/areas/eliminar/{id}','App\Http\Controllers\AreasController@eliminar')->name('eliminarAreas');
    Route::get('/areas/modificar/{id}','App\Http\Controllers\AreasController@mostrarModificar')->name('mostrarModificarAreas');
    Route::post('/areas/modificar/{id}','App\Http\Controllers\AreasController@modificar')->name('modificarAreas');

    //Planteles

    Route::get('/planteles/','App\Http\Controllers\PlantelesController@index')->name('mostrarPlanteles');
    Route::post('/planteles/','App\Http\Controllers\PlantelesController@store')->name('storePlanteles');
    Route::post('/planteles/eliminar/{id}','App\Http\Controllers\PlantelesController@eliminar')->name('eliminarPlanteles');
    Route::get('/planteles/modificar/{id}','App\Http\Controllers\PlantelesController@mostrarModificar')->name('mostrarModificarPlanteles');
    Route::post('/planteles/modificar/{id}','App\Http\Controllers\PlantelesController@modificar')->name('modificarPlanteles');

    //Movimientos

    Route::get('/movimientos/','App\Http\Controllers\MovimientosController@index')->name('mostrarMovimientos');

    //Crear Usuarios

    Route::get('/crear_usuarios/','App\Http\Controllers\CrearUsuariosController@index')->name('mostrarUsuarios');
    Route::post('/crear_usuarios/','App\Http\Controllers\CrearUsuariosController@store')->name('storeUsuarios');
    Route::post('/crear_usuarios/eliminar/{id}','App\Http\Controllers\CrearUsuariosController@eliminar')->name('eliminarUsuarios');
    Route::get('/crear_usuarios/modificar/{id}','App\Http\Controllers\CrearUsuariosController@mostrarModificar')->name('mostrarModificarUsuarios');
    Route::post('/crear_usuarios/modificar/{id}','App\Http\Controllers\CrearUsuariosController@modificar')->name('modificarUsuarios');





});

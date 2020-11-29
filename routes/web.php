<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalawowController;
use App\Http\Controllers\SalasCreadasController;
use App\Http\Controllers\FixtureWowController;
use App\Http\Controllers\MyticSelectionController;

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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('sala/menu-usuario');
})->name('dashboard');

//si desea ir al dashboard utilize este link
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/



Route::view('/home','home')->name('home');
Route::view('/prueba','prueba')->name('prueba');
Route::view('/menu-usuario','sala/menu-usuario')->name('menu-usuario');
Route::view('/seleccion-juego','sala/seleccion-juego')->name('seleccion-juego');
Route::view('sala/seleccion-juego','sala/seleccion-juego')->name('seleccion-juego-sala');
Route::view('/salas-creadas','sala/salas-creadas')->name('salas-creadas');
Route::view('sala/salas-creadas','sala/salas-creadas')->name('salas-creadas-sala');
Route::view('/creacion-sala-dota2','sala/creacion-sala-dota2')->name('creacion-sala-dota2');


//recibe los datos  desde creacion-sala-dota2
Route::post('/sala/addModelSala','App\Http\Controllers\salaController@index')->name('add-Model-Sala');
//recibe los datos  desde el controlador salaController@index
Route::view('/sala/creacion-equipos-sala-dota2','sala/creacion-equipos-sala-dota2')->name('creacion-equipos-sala-dota2');

//recibe los datos desde creacion-equipos-sala-dota2
Route::post('/sala/addModelEquipos','App\Http\Controllers\equiposdota2Controller@index')->name('add-Model-Equipos');
//recibe los datos desde el controlador equiposdota2Controller@index
Route::view('/sala/revicion-sala-dota2','sala/revicion-sala-dota2')->name('revicion-sala-dota2');


//recibe los datos desde revision-sala-dota2
Route::post('/sala/crearTorneo','App\Http\Controllers\salaController@create')->name('createSalaDota2');
//recibe los datos desde el controlador equiposdota2Controller@index
Route::view('/sala/revicion-sala-dota2','sala/revicion-sala-dota2')->name('revicion-sala-dota2');

//recibe el codigo de la sala y presenta los detalles de la partida desde salas-creadas
Route::post('/sala/detalles-partida-dota2/{id}','App\Http\Controllers\detallesController@index')->name('detalles-sala-dota2');
Route::view('/sala/detalles-show-dota2','sala/detalles-partida-dota2')->name('detalles-show-dota2');


//salas world of warcraft
Route::get('/torneo-wow', [SalawowController::class, 'index'])->name('RCrearTorneo');
Route::post('/torneo-wow-registrado', [SalawowController::class, 'create'])->name('RAñadirTorneo');

Route::get('/salas-creadas', [SalasCreadasController::class, 'index'])->name('Rsalas');


Route::get('/fixture-wow-{idsala}', [FixtureWowController::class, 'index'])->name('RFixture');

Route::get('/mytic-seleccion-wow-{idmytic}', [MyticSelectionController::class, 'index'])->name('RMytic');

















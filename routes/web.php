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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('menu-usuario');
})->name('dashboard');

//si desea ir al dashboard utilize este link
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/



Route::view('/home','home')->name('home');
Route::view('/prueba','prueba')->name('prueba');
Route::view('/menu-usuario','menu-usuario')->name('menu-usuario');
Route::view('/seleccion-juego','/seleccion-juego')->name('seleccion-juego');
Route::view('/salas-creadas','/salas-creadas')->name('salas-creadas');
Route::view('/creacion-sala-dota2','/creacion-sala-dota2')->name('creacion-sala-dota2');
Route::view('/creacion-sala-wow','creacion-sala-wow')->name('creacion-sala-wow');

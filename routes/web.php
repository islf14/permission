<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('notas','NotasController@index')->name('notas')->middleware('permiso:notas.index');

Route::get('notas/crear','NotasController@create')->name('notas.create')->middleware('permiso:crear-notas');


// Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar');

// Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar')->middleware('permiso.eliminar-notas');

Route::group(['middleware' => ['permiso:eliminar-notas']], function(){
    Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar');
});
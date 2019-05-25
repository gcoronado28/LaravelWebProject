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

Route::resource('ingredientes', 'IngredienteController');
Route::resource('platos', 'PlatoController');
Route::put('/platos/relate/{plato}','PlatoController@relate')->name('platos.relate');
Route::resource('ordenes', 'OrdenController');
Route::put('/ordenes/relate/{orden}','OrdenController@relate')->name('ordenes.relate');
Route::put('/orden/close','OrdenController@close')->name('ordenes.close');

Route::post('/orden/unrelate','OrdenController@unrelate')->name('orden.unrelate');
Route::get('/orden/ventas','OrdenController@ventas')->name('orden.ventas');
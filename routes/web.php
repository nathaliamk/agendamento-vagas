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
Route::get('/vagas', 'VagasController@index')
->name('listar_vagas');
Route::get('/vagas/criar', 'VagasController@create');
Route::post('/vagas/criar', 'VagasController@store');
Route::delete('/vagas/{id}', 'VagasController@destroy');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

// Somente admin tem o acesso
Route::get('/registro', 'RegistroController@create');
Route::post('/registro', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
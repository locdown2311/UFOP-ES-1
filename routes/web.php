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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'PageController@index');    
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/postAviso', 'AvisosController@store');  
    Route::post('/postTurma','TurmasController@store');  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{filtro}','HomeController@filtrarMensagens')->name('home.filtro');
//PERFIL
Route::get('/perfil','HomeController@perfil')->name('perfil');
Route::patch('/atualizaP/{id}','HomeController@atualizaPerfil')->name('atualizaP');
//ALUNOS
Route::get('/alocaaluno','TurmasController@alocaAlunos');
Route::get('/desalocaaluno','TurmasController@desalocaAlunos');
//TURMAS
Route::post('/alocaEst','TurmasController@postAloca')->name('alocaaluno');
Route::get('criaturma','TurmasController@create')->name('criaturma');
Route::get('/visualizaT', 'TurmasController@index');
Route::get('/visualizaT/{id}', 'TurmasController@edit')->name('editarturma');
Route::delete('/deletaT/{id}','TurmasController@destroy')->name('deletaturma');
Route::patch('atualizaT/{id}','TurmasController@update')->name('atualizaturma');
//AVISOS
Route::delete('deletaP/{id}','AvisosController@destroy')->name('deletapost');
Route::get('/teste2','TesteController@perfil');


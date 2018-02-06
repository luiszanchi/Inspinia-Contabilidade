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


Route::get('/', 'UserController@index');
Route::get('/query', 'UserController@query');




Route::get('/grupo_gasto/lista', 'GrupoGastoController@index');
Route::get('/grupo_gasto/novo', 'GrupoGastoController@novo');
Route::post('/grupo_gasto/novo/gravar', 'GrupoGastoController@gravarNovo');
Route::get('/grupo_gasto/editar', 'GrupoGastoController@editar');
Route::post('/grupo_gasto/editar/gravar', 'GrupoGastoController@gravarEditar');
Route::get('/grupo_gasto/excluir', 'GrupoGastoController@excluir');
Route::post('/grupo_gasto/excluir/gravar', 'GrupoGastoController@gravarExcluir');




Route::get('/meio_pag_rec/lista','MeioPagRecController@index');
Route::get('/meio_pag_rec/novo','MeioPagRecController@novo');
Route::post('/meio_pag_rec/novo/gravar', 'MeioPagRecController@gravarNovo');
Route::get('/meio_pag_rec/editar', 'MeioPagRecController@editar');
Route::post('/meio_pag_rec/editar/gravar', 'MeioPagRecController@gravarEditar');
Route::get('/meio_pag_rec/excluir', 'MeioPagRecController@excluir');
Route::post('/meio_pag_rec/excluir/gravar', 'MeioPagRecController@gravarExcluir');

Route::post('/registro_rapido/gasto','RegistroRapidoController@gasto');
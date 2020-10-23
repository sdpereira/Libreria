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
 return view('contenido/contenido');
});

Route::get('categoria', 'CategoriaController@index'); //Traer
Route::get('selectCategoria', 'CategoriaController@getCategoria'); //Seleccionar
Route::post('categoria/registrar', 'CategoriaController@store'); //Guardar
Route::put('categoria/actualizar', 'CategoriaController@update'); //Actualizar
Route::post('categoria/eliminar', 'CategoriaController@destroy'); //Eliminar

Route::get('editorial', 'EditorialController@index');
Route::get('selectEditorial', 'EditorialController@getEditorial');
Route::post('editorial/registrar', 'EditorialController@store');
Route::put('editorial/actualizar', 'EditorialController@update');
Route::post('editorial/eliminar', 'EditorialController@destroy');

Route::get('idioma', 'IdiomaController@index');
Route::get('selectIdioma', 'IdiomaController@getIdioma');
Route::put('idioma/actualizar', 'IdiomaController@update');
Route::post('idioma/eliminar', 'IdiomaController@destroy');

Route::get('pais', 'PaisController@index');
Route::get('selectPais', 'PaisController@getPais');
Route::put('pais/actualizar', 'PaisController@update');
Route::post('/pais/eliminar', 'PaisController@destroy');

Route::get('autor', 'AutoresController@index');
Route::get('selectAutores', 'AutoresController@getAutores');
Route::post('/autor/registrar', 'AutoresController@store');
Route::put('autor/actualizar', 'AutoresController@update');
Route::post('/autor/eliminar', 'AutoresController@destroy');

Route::get('libro', 'LibroController@index');
Route::get('selectLibro', 'LibroController@getLibro');
Route::post('/libro/registrar', 'LibroController@store');
Route::put('libro/actualizar', 'LibroController@update');
Route::post('/libro/eliminar', 'LibroController@destroy');

Route::get('persona', 'PersonaController@index');
Route::get('selectPersona', 'PersonaController@getPersona');
Route::post('persona/registrar', 'PersonaController@store');
Route::put('persona/actualizar', 'PersonaController@update');
Route::post('persona/eliminar', 'PersonaController@destroy');
Route::get('selectTipoDoc', 'TipoDocumentoController@getTipoDoc');


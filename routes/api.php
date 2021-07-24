<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//categorias
Route::get('/categoria/inative/{id}', 'App\Http\Controllers\CategoriaController@inative');

Route::get('/categoria/{id}', 'App\Http\Controllers\CategoriaController@byId');

Route::put('/categoria/update', 'App\Http\Controllers\CategoriaController@update');

Route::delete('/categoria/delete', 'App\Http\Controllers\CategoriaController@destroy');

Route::get('/categorias', 'App\Http\Controllers\CategoriaController@index');

Route::post('/categoria', 'App\Http\Controllers\CategoriaController@store');





//produtos
Route::get('/produto/inative/{id}', 'App\Http\Controllers\ProdutoController@inative');

Route::get('/produto/{id}', 'App\Http\Controllers\ProdutoController@byId');

Route::get('/produtos', 'App\Http\Controllers\ProdutoController@index');

Route::post('/produto', 'App\Http\Controllers\ProdutoController@store');

Route::put('/produto', 'App\Http\Controllers\ProdutoController@update');

Route::delete('/produto', 'App\Http\Controllers\ProdutoController@destroy');







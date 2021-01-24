<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contato;

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


//Rotas Contato
Route::namespace('App\Http\Controllers\Api') ->group(function(){
    Route::get('/contato', 'ContatoController@index');
    Route::get('/contato/{id}','ContatoController@show');
    Route::post('/contato','ContatoController@save');
    Route::put('/contato/{id}','ProdutoController@update');
    Route::delete('/contato/{id}','ProdutoController@delete');
});

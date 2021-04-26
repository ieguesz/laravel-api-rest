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
Route::get('/',"MyapiController@index");
Route::get('/users',"MyapiController@apiUsers");
Route::get('/users/{id}',"MyapiController@apiUsers");
Route::get('/business',"MyapiController@apiBusiness");
Route::get('/business/{id}',"MyapiController@apiBusiness");
Route::get('/category',"MyapiController@apiCategory");
Route::get('/category/{id}',"MyapiController@apiCategory");
Route::get('/assignment',"MyapiController@apiAssignment");
Route::get('/assignment/{id}',"MyapiController@apiAssignment");
Route::get('/jerarquia',"MyapiController@apiHierarchyBasic");
Route::get('/jerarquia2',"MyapiController@apiHierarchyMedio");



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

Route::post('equipments', 'EquipmentController@store');
Route::put('equipments/{id}', 'EquipmentController@edit');
Route::delete('equipments/{id}', 'EquipmentController@delete');
Route::get('equipments', 'EquipmentController@index');

Route::post('login', 'UserController@login');
Route::get('users', 'UserController@index');
Route::post('users', 'UserController@store');
Route::put('users/{id}', 'UserController@edit');
Route::get('users/{id}', 'UserController@show');


Route::post('reports/ownership', 'ReportController@ownership');
Route::get('reports/submission', 'ReportController@submission');
Route::post('reports/fundings', 'ReportController@fundings');
Route::post('reports/conditions', 'ReportController@conditions');
Route::post('reports/coverages', 'ReportController@coverages');

Route::get('master/types', 'MasterController@listEquipmentType');
Route::post('master/types', 'MasterController@saveType');
Route::put('master/types/{id}', 'MasterController@updateType');
Route::get('master/types/{id}', 'MasterController@getEquipmentType');

Route::post('master/fundings', 'MasterController@saveFunding');
Route::put('master/fundings/{id}', 'MasterController@editFunding');
Route::get('master/fundings', 'MasterController@listFunding');
Route::get('master/fundings/{id}', 'MasterController@getFunding');

Route::post('master/land-areas', 'MasterController@saveLandArea');
Route::put('master/land-areas/{id}', 'MasterController@editLandArea');
Route::get('master/land-areas', 'MasterController@listLandArea');
Route::get('master/land-areas/{id}', 'MasterController@getLandArea');

Route::get('master/provinces', 'MasterController@listProvince');
Route::get('master/provinces/{id}', 'MasterController@getProvince');
Route::get('master/cities', 'MasterController@listCity');
Route::get('master/cities/{id}', 'MasterController@getCity');
Route::get('master/districts', 'MasterController@listDistrict');
Route::get('master/districts/{id}', 'MasterController@getDistrict');
Route::get('master/sub-districts', 'MasterController@listSubDistrict');
Route::get('master/sub-districts/{id}', 'MasterController@getSubDistrict');
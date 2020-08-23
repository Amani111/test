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

Route::get('All-vehicule', 'ApiController@AllVehicle');
Route::get('All-marque', 'ApiController@Allmarques');
Route::get('All-modele', 'ApiController@AllModeles');
Route::get('Show-Vehicule/{vehicule}', 'ApiController@showVehicule');
Route::patch('Update-Vehicule/{vehicule}', 'ApiController@updateVehicule');

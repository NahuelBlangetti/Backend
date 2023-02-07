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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::middleware('throttle:15 | 60,1')->group(function (){

        //User
        Route::post('login', 'App\Http\Controllers\AuthController@login');
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::post('me', 'App\Http\Controllers\AuthController@me');
        Route::post('register', 'App\Http\Controllers\AuthController@register');
        
        //Ṕeople
        Route::get('peoples', 'App\Http\Controllers\PeopleController@PeopleAll');
        Route::get('people/{id?}', 'App\Http\Controllers\PeopleController@PeopleId');
    
        //Planets
        Route::get('planets', 'App\Http\Controllers\PlanetsController@PlanetsAll');
        Route::get('planet/{id?}', 'App\Http\Controllers\PlanetsController@PlanetId');
    
        //Vehicles
        Route::get('vehicles', 'App\Http\Controllers\VehiclesController@VehiclesAll');
        Route::get('vehicle/{id?}', 'App\Http\Controllers\VehiclesController@VehicleId');
    });
});
<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/me', function (Request $request){
        return $request->user();
    });
    Route::get('logout', 'API\AuthController@logout');
    Route::post('/createCompany', 'CompanyController@create');
    Route::post('/register', 'AuthController@register');

});

Route::prefix('airlock')->namespace('API')->group(function() {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

});

Route::get('/devis', 'DevisController@list');


//Route::get
Route::post('signin', 'UserController@login');

Route::post('signup','UserController@signup');

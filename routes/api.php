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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
    Route::get('logout', 'API\AuthController@logout');
    Route::post('/register', 'AuthController@register');

    Route::post('/createCustomer', 'CustomerController@create');
    Route::post('/customers', 'CustomerController@getCustomerAll');

    Route::post('/createCompany', 'CompanyController@create');
    Route::get('/company', 'CompanyController@selectCompany');

    Route::post('/createContact', 'ContactController@create');
    Route::post('/contact', 'ContactController@getContact');
    Route::post('/updateContact', 'ContactController@updateContact');
    Route::post('/deleteContact', 'ContactController@deleteContact');

    Route::post('/invoice', 'InvoiceController@getInvoice');
    Route::post('/createInvoice', 'InvoiceController@create');
    Route::post('/updateInvoice', 'InvoiceController@update');
    Route::post('/deleteInvoice', 'InvoiceController@delete');

    Route::post('/quote', 'QuoteController@getquote');
    Route::post('/createQuote', 'QuoteController@create');
    Route::post('/updateQuote', 'QuoteController@update');
    Route::post('/deleteQuote', 'QuoteController@delete');

});

Route::prefix('airlock')->namespace('API')->group(function () {
    Route::post('/login', 'AuthController@login');

});

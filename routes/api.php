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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// login and registration
Route::post('/register', [
    'uses' => 'UserController@create'
]);

Route::post('/login', [
    'uses' => 'UserController@login'
]);

// customer routes

Route::post('/customer', [
    'uses' => 'CustomerController@postCustomer'
]);

Route::get('/customers', [
   'uses' => 'CustomerController@getCustomers'
]);

Route::get('customers/{id}', [
    'uses' => 'CustomerController@getCustomerByID'
]);

Route::put('/customer/{id}', [
    'uses' => 'CustomerController@putCustomer'
]);

Route::delete('/customer/{id}', [
    'uses' => 'CustomerController@deleteCustomer'
]);
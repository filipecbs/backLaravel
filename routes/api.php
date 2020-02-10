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

Route::get('user', 'UserController@listUser');
Route::get('user/{id}', 'UserController@showUser');
Route::get('userProducts/{id}', 'UserController@userProducts'); //retorna usuário junto com seus produtos
Route::post('user', 'UserController@createUser');
//Route::put('user/{id}', 'UserController@editUser');
//Route::post('user/{id}', 'UserController@deleteUser');

Route::get('product', 'ProductController@listProduct');
Route::get('product/{id}', 'ProductController@showProduct');

//colocadas aqui apenas para testar a função, estão comentadas dentro da middleware
Route::post('product', 'ProductController@createProduct');
Route::put('product/{id}', 'ProductController@editProduct');
Route::delete('product/{id}', 'ProductController@deleteProduct');

// rotas do Passport para as funções relativas a autenticação do usuário
Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {

    //Route::post('product', 'ProductController@createProduct');
    //Route::put('product/{id}', 'ProductController@editProduct');
    //Route::delete('product/{id}', 'ProductController@deleteProduct');

    Route::get('logout', 'API\PassportController@logout');
    Route::get('get-details', 'API\PassportController@getDetails');
});

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', ['as'=>'products', 'uses'=>  'ProductsController@index']);
Route::get('products/create', ['as'=>'product.create', 'uses'=> 'ProductsController@create']);
Route::post('products', ['as'=>'product.store', 'uses'=> 'ProductsController@store']);

Route::get('product/{id}', ['as'=>'product.delete', 'uses'=> 'ProductsController@delete']);

Route::get('product/edit/{id}', ['as'=>'product.edit', 'uses'=> 'ProductsController@edit']);

Route::post('product/update', ['as'=>'product.update', 'uses'=> 'ProductsController@update']);

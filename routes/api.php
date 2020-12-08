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


Route::get('getQuantity/{id}', function ($id) {
	$quantity = App\Productvolume::select('quantity')->where('id', $id)->first();
	return $quantity;
});

Route::get('search', 'SearchController@search')->name('search');

Route::get('filter', 'FilterController@filter')->name('filter');
Route::get('getOrders', 'OrderController@getOrders')->name('getOrders');


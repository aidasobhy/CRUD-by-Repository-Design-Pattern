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

Route::group(['namespace'=>'Api','prefix'=>'products'],function (){
    Route::post('all','ProductController@index');
    Route::post('store','ProductController@store');
    Route::post('update/{productId}','ProductController@update');
    Route::post('delete/{productId}','ProductController@delete');
    Route::post('product-details/{productId}','ProductController@getProductDetails');
});



Route::group(['namespace'=>'Api','prefix'=>'pharmacies'],function (){
    Route::post('all','PharmacyController@index');
    Route::post('store','PharmacyController@create');
    Route::post('update/{pharmacyId}','PharmacyController@update');
    Route::post('delete/{pharmacyId}','PharmacyController@delete');
    Route::post('show-products/{pharmacyId}','PharmacyController@showProductsInPharmacy');

});


Route::group(['namespace'=>'Api','prefix'=>'pharmacies'],function (){
    Route::post('{pharmacyId}/add-product','PharmacyProductController@addProductToPharmacy');
    Route::post('get-data-select2','PharmacyProductController@getDataSelect2');
});

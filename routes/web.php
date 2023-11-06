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
    return view('site.index');
});
#######################Products Routes######################################
Route::group(['namespace' => 'Site', 'prefix' => 'products'], function () {
    Route::get('all', 'ProductController@index')->name('products.all');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('save', 'ProductController@store')->name('product.store');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('update/{id}', 'ProductController@update')->name('product.update');
    Route::get('delete/{id}', 'ProductController@delete')->name('product.delete');

    Route::get('product-details/{id}', 'ProductController@getProductDetails')->name('get.product.details');
});

#######################Pharmacies Routes######################################
Route::group(['namespace' => 'Site', 'prefix' => 'pharmacies'], function () {
    Route::get('all','PharmacyController@index')->name('pharmacies.all');
    Route::get('create', 'PharmacyController@create')->name('pharmacy.create');
    Route::post('save', 'PharmacyController@store')->name('pharmacy.store');
    Route::get('edit/{pharmacyId}', 'PharmacyController@edit')->name('pharmacy.edit');
    Route::post('update/{pharmacyId}', 'PharmacyController@update')->name('pharmacy.update');
    Route::get('delete/{pharmacyId}', 'PharmacyController@delete')->name('pharmacy.delete');
    Route::get('show-products/{pharmacyId}', 'PharmacyController@showProductsInPharmacy')->name('show.products.inPharmacy');
});

#######################PharmaciesProducts Routes######################################
Route::group(['namespace' => 'Site', 'prefix' => 'pharmacies'], function () {
    Route::get('search-product-select2','PharmacyProductController@searchProductSelect2')->name('search.ProductSelect2');
    Route::get('{pharmacyId}/add-product','PharmacyProductController@addProductToPharmacy')->name('add.product.toPharmacy');
    Route::post('{pharmacyId}/store-product','PharmacyProductController@storeProductToPharmacy')->name('store.product.toPharmacy');
    Route::get('edit-product/{pharmacyProductId}','PharmacyProductController@editProductInPharmacy')->name('edit.product.InPharmacy');

});






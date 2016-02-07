<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 
 
// Authentication routes...
Route::get('/', 'LoginController@getLogin');

Route::get('/register', 'LoginController@getRegister');
Route::post('/register', 'LoginController@doRegister'); 

Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@doLogin'); 
Route::get('/logout','LoginController@logout');

Route::get('/dashboard','LoginController@dashboard');

// Tax Pages routes...
Route::get('/tax-view', 'TaxController@viewTax');
// Route::get('/tax-add', 'TaxController@viewTaxAddForm');
Route::get('/tax-add', 'TaxController@viewForm');
Route::post('/tax_save', 'TaxController@tax_save');
Route::get('/tax-edit/{id}', 'TaxController@tax_edit');
Route::post('/update', 'TaxController@update');
Route::get('/tax-delete/{id}', 'TaxController@delete');

// payment Pages routes...
Route::get('/payment-view', 'PaymentController@viewPayment');
Route::get('/payment-add', 'PaymentController@viewForm');
Route::post('/payment_save', 'PaymentController@payment_save');
Route::get('/payment-edit/{id}', 'PaymentController@payment_edit');
Route::post('/payment-update', 'PaymentController@update');
Route::get('/payment-delete/{id}', 'PaymentController@delete');

// profile-view Pages routes...
Route::get('/profile-view', 'profileController@viewProfile');
Route::post('/profile-update', 'profileController@update');

// setting Pages routes...
Route::get('/setting-view', 'settingController@view');
Route::post('/profile-update', 'settingController@update');

// merchandiser Pages routes...
Route::get('/merchandiser-view', 'MerchandisersController@view');
Route::get('/merchandiser-add', 'MerchandisersController@add');
Route::post('/merchandiser_save', 'MerchandisersController@save');
Route::get('/merchandiser-edit/{id}', 'MerchandisersController@edit');
Route::post('/merchandiser-update', 'MerchandisersController@update');
Route::get('/merchandiser-delete/{id}', 'MerchandisersController@delete');

// Channel Pages routes...
Route::get('/channel-view', 'ChannelController@view');
Route::get('/channel-add', 'ChannelController@add');
Route::post('/channel_save', 'ChannelController@save');
Route::get('/channel-edit/{id}', 'ChannelController@edit');
Route::post('/channel-update', 'ChannelController@update');
Route::get('/channel-delete/{id}', 'ChannelController@delete');

// Suppliers Pages routes...
Route::get('/suppliers-view', 'SupplierController@view');
Route::get('/suppliers-add', 'SupplierController@add');
Route::post('/suppliers_save', 'SupplierController@save');
Route::get('/suppliers-edit/{id}', 'SupplierController@edit');
Route::post('/suppliers-update', 'SupplierController@update');
Route::get('/suppliers-delete/{id}', 'SupplierController@delete');

// SalesPerson Pages routes...
Route::get('/salesperson-view', 'SalesPersonController@view');
Route::get('/salesperson-add', 'SalesPersonController@add');
Route::post('/salesperson_save', 'SalesPersonController@save');
Route::get('/salesperson-edit/{id}', 'SalesPersonController@edit');
Route::post('/salesperson-update', 'SalesPersonController@update');
Route::get('/salesperson-delete/{id}', 'SalesPersonController@delete');

// Area-Route routes...
Route::get('/area-view', 'AreaViewController@viewpage'); 

// -- Provice Routs
Route::get('/add-province', 'AreaViewController@add_province_form'); 
Route::post('/add-province', 'AreaViewController@province_save'); 
Route::get('/edit-province/{id}', 'AreaViewController@edit_province_form');
Route::post('/edit-province', 'AreaViewController@province_update');
Route::get('/delete-province/{id}', 'AreaViewController@province_delete');

// -- District Routs
Route::get('/add-district', 'AreaViewController@add_district_form'); 
Route::post('/add-district', 'AreaViewController@district_save'); 
Route::get('/edit-district/{id}', 'AreaViewController@edit_district_form');
Route::post('/edit-district', 'AreaViewController@district_update');
Route::get('/delete-district/{id}', 'AreaViewController@district_delete');

// -- City Routs
Route::get('/add-city', 'AreaViewController@add_city_form'); 
Route::post('/add-city', 'AreaViewController@city_save'); 
Route::get('/edit-city/{id}', 'AreaViewController@edit_city_form');
Route::post('/edit-city', 'AreaViewController@city_update');
Route::get('/delete-city/{id}', 'AreaViewController@city_delete');

// -- Area Routs
Route::get('/add-area', 'AreaViewController@add_area_form'); 
Route::post('/add-area', 'AreaViewController@area_save'); 
Route::get('/edit-area/{id}', 'AreaViewController@edit_area_form');
Route::post('/edit-area', 'AreaViewController@area_update');
Route::get('/delete-area/{id}', 'AreaViewController@area_delete');

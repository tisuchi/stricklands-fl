<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Admin\AuthController@showLogin')->name('login');
Route::post('login', 'Admin\AuthController@doLogin')->name('login');
Route::get('logout', 'Admin\AuthController@doLogout')->name('logout');



//admin/inventory/search
Route::group(['prefix' => 'admin'], function (){
	//its for inventory
	Route::group(['prefix' => 'inventory'], function (){
		Route::get('search', 'Admin\InventoryController@showSearch')->name('admin-search');
	});
});
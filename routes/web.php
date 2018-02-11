<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Admin\AuthController@showLogin')->name('login');
Route::post('login', 'Admin\AuthController@doLogin')->name('login');
Route::get('logout', 'Admin\AuthController@doLogout')->name('logout');



Route::group(['middleware' => 'auth'], function () {
	//admin/inventory/search
	
	Route::group(['prefix' => 'admin'], function (){
		
		//its for inventory
		Route::group(['prefix' => 'inventory'], function (){
			Route::get('search', 'Admin\InventoryController@showSearch')->name('inventory-search');
			Route::get('count', 'Admin\InventoryController@countInventory')->name('inventory-count');
			Route::get('description', 'Admin\InventoryController@showDescription')->name('inventory-description');
			Route::post('description', 'Admin\InventoryController@postDescription')->name('update-inventory-description');
			Route::get('tradein-listview', 'Admin\InventoryController@showTradeinListView')->name('inventory-tradein-listviews');

		});
	

	});



});

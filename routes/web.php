<?php


Route::get('/', function () {
    return view('welcome');
});


//admin/inventory/search
Route::group(['prefix' => 'admin'], function (){


	//its for inventory
	Route::group(['prefix' => 'inventory'], function (){
		Route::get('search', 'Admin\InventoryController@showSearch')->name('admin-search');
	});

});
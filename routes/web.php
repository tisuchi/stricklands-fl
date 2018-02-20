<?php


/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'Admin\AuthController@showLogin')->name('login');
Route::get('login', 'Admin\AuthController@showLogin')->name('login');
Route::post('login', 'Admin\AuthController@doLogin')->name('login');
Route::get('logout', 'Admin\AuthController@doLogout')->name('logout');

Route::get('forget', 'Admin\AuthController@showForgetPassword')->name('forget-password');
Route::post('forget', 'Admin\AuthController@doForgetPassword')->name('forget-password');

Route::get('confirm-password-reset/{hash}', 'Admin\AuthController@confirmPasswordReset')->name('confirm-password-Reset');


Route::get('test', 'Admin\AdminController@test')->name('test');




//get image data from search page
Route::get('getimagedata/{id}', 'Admin\AdminController@getImageData')->name('get-image-data');



Route::group(['middleware' => 'auth'], function () {
	
	Route::group(['prefix' => 'admin'], function (){

		Route::get('/', 'Admin\AdminController@index')->name('index-dashboard');

		//its for inventory
		Route::group(['prefix' => 'inventory'], function (){
			
			Route::get('search', 'Admin\InventoryController@showSearch')->name('inventory-search');
			Route::get('count', 'Admin\InventoryController@countInventory')->name('inventory-count');
			Route::get('description', 'Admin\InventoryController@showDescription')->name('inventory-description');
			Route::post('description', 'Admin\InventoryController@postDescription')->name('update-inventory-description');
			Route::get('tradein-listview', 'Admin\InventoryController@showTradeinListView')->name('inventory-tradein-listviews');
			Route::get('print-list', 'Admin\InventoryController@showPrintInventoryList')->name('inventory-list-print');
			Route::get('print-list-after-search', 'Admin\InventoryController@doPrintListAfterSearch')->name('inventory-list-print-after-search');

		});
	

	});



});

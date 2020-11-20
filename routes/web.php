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

Auth::routes();
Route::get('/home', [App\Http\Controllers\ProjectController::class, 'listCategory'])->name('home');

Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


// Start Category Route-------------------------------------------------------------->

	Route::get('listCategory', ['as' => 'category.listCategory', 'uses' => 'App\Http\Controllers\ProjectController@listCategory']);
	Route::get('addCategory', ['as' => 'category.addCategory', 'uses' => 'App\Http\Controllers\ProjectController@addCategory']);
	Route::post('addNewCategory',['as' => 'category.addNewCategory', 'uses' => 'App\Http\Controllers\ProjectController@addNewCategory']);
	Route::get('editCategory/{id}', ['as' => 'category.editCategory', 'uses' => 'App\Http\Controllers\ProjectController@editCategory']);
	Route::post('updateCategory',['as' => 'category.updateCategory', 'uses' => 'App\Http\Controllers\ProjectController@updateCategory']);
	Route::get('deleteCategory/{id}',['as' => 'category.deleteCategory', 'uses' => 'App\Http\Controllers\ProjectController@deleteCategory']);

	
// Start SubCategory Route-------------------------------------------------------------->

Route::get('listSubcategory', ['as' => 'subcategory.listSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@listSubcategory']);
Route::get('addSubcategory', ['as' => 'subcategory.addSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@addSubcategory']);
Route::post('addNewSubcategory',['as' => 'subcategory.addNewSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@addNewSubcategory']);
Route::get('editSubcategory/{id}', ['as' => 'subcategory.editSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@editSubcategory']);
Route::post('updateSubcategory',['as' => 'subcategory.updateSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@updateSubcategory']);
Route::get('deleteSubcategory/{id}',['as' => 'subcategory.deleteSubcategory', 'uses' => 'App\Http\Controllers\ProjectController@deleteSubcategory']);


// Start Attribute Route-------------------------------------------------------------->

Route::get('listAttribute', ['as' => 'attribute.listAttribute', 'uses' => 'App\Http\Controllers\ProjectController@listAttribute']);
Route::get('addAttribute', ['as' => 'attribute.addAttribute', 'uses' => 'App\Http\Controllers\ProjectController@addAttribute']);
Route::post('addNewAttribute',['as' => 'attribute.addNewAttribute', 'uses' => 'App\Http\Controllers\ProjectController@addNewAttribute']);
Route::get('editAttribute/{id}', ['as' => 'attribute.editAttribute', 'uses' => 'App\Http\Controllers\ProjectController@editAttribute']);
Route::post('updateAttribute',['as' => 'attribute.updateAttribute', 'uses' => 'App\Http\Controllers\ProjectController@updateAttribute']);
Route::get('deleteAttribute/{id}',['as' => 'attribute.deleteAttribute', 'uses' => 'App\Http\Controllers\ProjectController@deleteAttribute']);
Route::get('addValue/{id}', ['as' => 'attribute.addValue', 'uses' => 'App\Http\Controllers\ProjectController@addValue']);
Route::post('updateValue',['as' => 'attribute.updateValue', 'uses' => 'App\Http\Controllers\ProjectController@updateValue']);


// Start Product Route-------------------------------------------------------------->

Route::get('listProduct', ['as' => 'product.listProduct', 'uses' => 'App\Http\Controllers\ProjectController@listProduct']);
Route::get('addProduct', ['as' => 'product.addProduct', 'uses' => 'App\Http\Controllers\ProjectController@addProduct']);
Route::post('addNewProduct',['as' => 'product.addNewProduct', 'uses' => 'App\Http\Controllers\ProjectController@addNewProduct']);
Route::get('editProduct/{id}', ['as' => 'product.editProduct', 'uses' => 'App\Http\Controllers\ProjectController@editProduct']);
Route::post('updateProduct',['as' => 'product.updateProduct', 'uses' => 'App\Http\Controllers\ProjectController@updateProduct']);
Route::get('deleteProduct/{id}',['as' => 'product.deleteProduct', 'uses' => 'App\Http\Controllers\ProjectController@deleteProduct']);

Route::get('addImg/{id}', ['as' => 'product.addImg', 'uses' => 'App\Http\Controllers\ProjectController@addImg']);
Route::post('uploadImg',['as' => 'product.uploadImg', 'uses' => 'App\Http\Controllers\ProjectController@uploadImg']);
Route::get('fetchImg', ['as' => 'product.fetchImg', 'uses' => 'App\Http\Controllers\ProjectController@fetchImg']);
Route::post('deleteImg', ['as' => 'product.deleteImg', 'uses' => 'App\Http\Controllers\ProjectController@deleteImg']);

// Start Notification Route-------------------------------------------------------------->

Route::get('listNotification', ['as' => 'notification.listNotification', 'uses' => 'App\Http\Controllers\ProjectController@listNotification']);
Route::get('addNotification', ['as' => 'notification.addNotification', 'uses' => 'App\Http\Controllers\ProjectController@addNotification']);
Route::post('addNewNotification',['as' => 'notification.addNewNotification', 'uses' => 'App\Http\Controllers\ProjectController@addNewNotification']);
Route::get('deleteNotification/{id}',['as' => 'notification.deleteNotification', 'uses' => 'App\Http\Controllers\ProjectController@deleteNotification']);
Route::get('editNotification/{id}', ['as' => 'notification.editNotification', 'uses' => 'App\Http\Controllers\ProjectController@editNotification']);
Route::post('updateNotification',['as' => 'notification.updateNotification', 'uses' => 'App\Http\Controllers\ProjectController@updateNotification']);

// Start Banner Route-------------------------------------------------------------->

Route::get('listBanner', ['as' => 'banner.listBanner', 'uses' => 'App\Http\Controllers\ProjectController@listBanner']);
Route::get('addBanner', ['as' => 'banner.addBanner', 'uses' => 'App\Http\Controllers\ProjectController@addBanner']);
Route::post('addNewBanner',['as' => 'banner.addNewBanner', 'uses' => 'App\Http\Controllers\ProjectController@addNewBanner']);
Route::get('editBanner/{id}', ['as' => 'banner.editBanner', 'uses' => 'App\Http\Controllers\ProjectController@editBanner']);
Route::post('updateBanner',['as' => 'banner.updateBanner', 'uses' => 'App\Http\Controllers\ProjectController@updateBanner']);
Route::get('deleteBanner/{id}',['as' => 'banner.deleteBanner', 'uses' => 'App\Http\Controllers\ProjectController@deleteBanner']);

// Start Dboy Route-------------------------------------------------------------->

Route::get('listDboy', ['as' => 'dboy.listDboy', 'uses' => 'App\Http\Controllers\ProjectController@listDboy']);
Route::get('addDboy', ['as' => 'dboy.addDboy', 'uses' => 'App\Http\Controllers\ProjectController@addDboy']);
Route::post('addNewDboy',['as' => 'dboy.addNewDboy', 'uses' => 'App\Http\Controllers\ProjectController@addNewDboy']);
Route::get('editDboy/{id}', ['as' => 'dboy.editDboy', 'uses' => 'App\Http\Controllers\ProjectController@editDboy']);
Route::post('updateDboy',['as' => 'dboy.updateDboy', 'uses' => 'App\Http\Controllers\ProjectController@updateDboy']);
Route::get('deleteDboy/{id}',['as' => 'dboy.deleteDboy', 'uses' => 'App\Http\Controllers\ProjectController@deleteDboy']);


// Start City Route-------------------------------------------------------------->

Route::get('listCity', ['as' => 'city.listCity', 'uses' => 'App\Http\Controllers\ProjectController@listCity']);
Route::get('addCity', ['as' => 'city.addCity', 'uses' => 'App\Http\Controllers\ProjectController@addCity']);
Route::post('addNewCity',['as' => 'city.addNewCity', 'uses' => 'App\Http\Controllers\ProjectController@addNewCity']);
Route::get('editCity/{id}', ['as' => 'city.editCity', 'uses' => 'App\Http\Controllers\ProjectController@editCity']);
Route::post('updateCity',['as' => 'city.updateCity', 'uses' => 'App\Http\Controllers\ProjectController@updateCity']);
Route::get('deleteCity/{id}',['as' => 'city.deleteCity', 'uses' => 'App\Http\Controllers\ProjectController@deleteCity']);


// Start Order Route-------------------------------------------------------------->

Route::get('listOrder', ['as' => 'order.listOrder', 'uses' => 'App\Http\Controllers\ProjectController@listOrder']);
Route::get('addOrder', ['as' => 'order.addOrder', 'uses' => 'App\Http\Controllers\ProjectController@addOrder']);
Route::post('addNewOrder',['as' => 'order.addNewOrder', 'uses' => 'App\Http\Controllers\ProjectController@addNewOrder']);
Route::get('editOrder/{id}', ['as' => 'order.editOrder', 'uses' => 'App\Http\Controllers\ProjectController@editOrder']);
Route::post('updateOrder',['as' => 'order.updateOrder', 'uses' => 'App\Http\Controllers\ProjectController@updateOrder']);
Route::get('deleteOrder/{id}',['as' => 'order.deleteOrder', 'uses' => 'App\Http\Controllers\ProjectController@deleteOrder']);


});


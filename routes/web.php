<?php

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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
// PRODUCT
Route::prefix('product')->name('product.')->group(function(){
	Route::get('/', 'ProductController@index')->name('all');
	Route::get('/category/{id}', 'ProductController@category')->name('category');
	Route::get('/view/{id}', 'ProductController@view')->name('view');
});

// CUSTOMER SESSION
Route::namespace('Customer')->prefix('customer')->name('customer.')->group(function(){	
	// BAG
	Route::prefix('bag')->name('bag.')->group(function(){
		Route::get('/', 'BagController@index')->name('mybag')->middleware('auth');
		Route::post('/add/{id}', 'BagController@add')->name('add')->middleware('auth');
		Route::get('/delete/{id}', 'BagController@delete')->name('delete')->middleware('auth');
	});
	// Transaction
	Route::prefix('transaction')->name('transaction.')->group(function(){
		Route::get('/', 'TransactionController@index')->name('mytransaction')->middleware('auth');
		Route::delete('/add', 'TransactionController@add')->name('add')->middleware('auth');
		Route::get('/verify/{id}', 'TransactionController@verify')->name('verify')->middleware('auth');
		Route::post('/verify/{id}', 'TransactionController@doverify')->name('doverify')->middleware('auth');
	});

});

// ADMIN SESSION
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){	
	// HOME
	Route::get('/', 'HomeController@index')->name('home')->middleware('admin');
	Route::get('/logout', 'HomeController@logout')->name('logout')->middleware('admin');

	// CATEGORY
	Route::prefix('category')->name('category.')->group(function(){
		Route::get('/data', 'CategoryController@index')->name('data')->middleware('admin');
		Route::get('/add', 'CategoryController@add')->name('add')->middleware('admin');
		Route::post('/insert', 'CategoryController@store')->name('insert')->middleware('admin');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('edit')->middleware('admin');
		Route::post('/update/{id}', 'CategoryController@update')->name('update')->middleware('admin');
		Route::delete('/delete/{id}', 'CategoryController@delete')->name('delete')->middleware('admin');
	});

	// PRODUCT
	Route::prefix('product')->name('product.')->group(function(){
		Route::get('/data', 'ProductController@index')->name('data')->middleware('admin');
		Route::get('/add', 'ProductController@add')->name('add')->middleware('admin');
		Route::post('/insert', 'ProductController@store')->name('insert')->middleware('admin');
		Route::get('/edit/{id}', 'ProductController@edit')->name('edit')->middleware('admin');
		Route::post('/update/{id}', 'ProductController@update')->name('update')->middleware('admin');
		Route::delete('/delete/{id}', 'ProductController@delete')->name('delete')->middleware('admin');

		Route::get('/upload/{id}', 'ProductController@upload')->name('upload')->middleware('admin');
		Route::post('/uploading/{id}', 'ProductController@uploading')->name('uploading')->middleware('admin');
	});

	// CUSTOMER
	Route::prefix('customer')->name('customer.')->group(function(){
		Route::get('/data', 'CustomerController@index')->name('data')->middleware('admin');
	});
	// TRANSACTION
	Route::prefix('transaction')->name('transaction.')->group(function(){
		Route::get('/data', 'TransactionController@index')->name('data')->middleware('admin');
		Route::get('/status/{id}/{val}', 'TransactionController@status')->name('status')->middleware('admin');
		Route::get('/payments', 'TransactionController@payments')->name('payments')->middleware('auth');

	});
	// PAYMENT
	Route::prefix('payment')->name('payment.')->group(function(){
		Route::get('/data', 'CustomerController@index')->name('data')->middleware('admin');
	});

});

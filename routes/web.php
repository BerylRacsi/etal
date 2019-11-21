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

/*Pages*/
Route::get('/','PagesController@index');

Route::get('/product/{id}','PagesController@show');

Route::get('/checkout','PagesController@create');

Route::get('cek-kabupaten','PagesController@kabupaten');

Route::post('cek-ongkir','PagesController@ongkir');

Route::post('submit-order','PagesController@store');

Route::get('/checkout/{id}','PagesController@confirm');

Route::post('bukti','PagesController@upload');

Route::get('success', function(){
	return view('success');
});

Route::post('cekstatus','PagesController@cekstatus');

Route::get('status',function(){
    return view('cekstatus');
  })->name('status');

Route::get('filter','PagesController@filter');

Route::get('category/{id}','PagesController@category')->name('hahaha');

Route::get('search','PagesController@search');

Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

Route::get('info', 'PagesController@info');

Route::get('ourteam', function(){
	return view('contributor');
});

/*Cart*/
Route::get('/shop', 'ShopsController@index');
 
Route::get('cart', 'ShopsController@cart');
 
Route::get('add-to-cart/{id}/{qty}/{size}/{sn}', 'ShopsController@addToCart');

Route::patch('update-cart', 'ShopsController@update');
 
Route::delete('remove-from-cart', 'ShopsController@remove');

Route::get('check-stock', 'ShopsController@checkstock');

/*Contributor*/
Route::resource('contributor','ContributorController');

Route::get('contributors','PagesController@contributors');
Route::get('contributors/{id}','PagesController@contributors_show');

/*Admin*/
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin');
	
	Route::get('/order/export_payed', 'OrderController@export_payed');
	Route::get('/order/export_sent', 'OrderController@export_sent');
	Route::get('/order/validasi/{id}', 'OrderController@validasi');

	Route::resource('manage','AdministratorController');
	Route::resource('product','ProductController');
	Route::resource('order','OrderController');
	Route::resource('slider','SliderController');
	Route::resource('cover','CoverController');
	Route::resource('sale','SaleController');

});

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

Route::group(['middleware' => 'auth'], function(){
  Route::resource('quotes', 'QuoteController', ['except' => ['index', 'show']]);
  Route::post('quotes-comment/{id}', 'QuoteCommentController@store');
  Route::put('quotes-comment/{id}', 'QuoteCommentController@update');
  Route::get('quotes-comment/{id}/edit', 'QuoteCommentController@edit');
  Route::get('produk', 'produkController@redir');
  Route::get('produk/tambah', 'produkController@buat');
  Route::post('produk/tambah', 'produkController@store');
  Route::get('produk/{id}', 'produkController@lihat');
  Route::get('produk/ubah/{idproduk}', 'produkController@ubah');
  Route::post('produk/ubah/{idproduk}', 'produkController@update');
  Route::delete('quotes-comment/{id}', 'QuoteCommentController@destroy');
  Route::get('buat-toko', 'produkController@buatToko');
  Route::post('produk/{slug}', 'produkController@store');
  Route::get('profile', 'HomeController@lihat');
  Route::get('jual', 'HomeController@jual');
  Route::get('ubah-profile', 'HomeController@ubah');
  Route::get('toko-error', 'HomeController@error');
  Route::post('buat-toko','tokoController@store');
  Route::get('keranjang','produkController@lihatkeranjang');
  Route::get('hapusbarang/{id}','produkController@hapuskeranjang');
  Route::get('checkoutproduk/{id}','produkController@checkproduk');
  Route::post('masukkeranjang/{id}','produkController@masukkeranjang');
});

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();
  Route::get('/', 'produkController@tampil');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id?}', 'HomeController@profile');
Route::get('/quotes/random', 'QuoteController@random');
Route::resource('quotes', 'QuoteController', ['only' => ['index', 'show']]);

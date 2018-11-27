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
  Route::post('profile', 'HomeController@update');
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
  Route::post('checkoutproduk/{id}','HomeController@checkout');
  Route::get('bayar/{id}','produkController@masukbayar');
  Route::get('pembayaran','produkController@viewpembayaran');
  Route::post('masukkeranjang/{id}','produkController@masukkeranjang');
  Route::post('submitbukti/{id}','produkController@buktipembayaran');
  Route::get('pengaturan-toko', 'tokoController@profilToko');
  Route::get('toko/{nama_toko}', 'tokoController@kunjungiToko');
  Route::get('alamat_pembayaran/{id}', 'HomeController@alamat');
  Route::get('admin', 'HomeController@admin');
  Route::get('admin/list-pengguna', 'adminController@pengguna');
  Route::get('admin/lelang', 'adminController@lelang');
  Route::get('admin/verifikasi', 'adminController@verifikasi');
  Route::get('admin/verifikasi/daftar-pembayaran', 'adminController@daftarPembayaran');
  Route::get('pesanan', 'produkController@pesanan');
  Route::post('verifikasi/{id}', 'adminController@verifPesanan');
});

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();
  Route::get('/', 'produkController@tampil');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id?}', 'HomeController@profile');
Route::get('/cari', 'HomeController@cari');
Route::get('/cari/filter/{kategori}', 'HomeController@filter');
Route::resource('quotes', 'QuoteController', ['only' => ['index', 'show']]);

<?php

use Illuminate\Support\Facades\Route;
use App\DataTables\UsersDataTable;
use App\DataTables\StokDataTable;
use App\DataTables\KontakDataTable;
use App\Http\Resources\BarangResource;
use App\Barang;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('stok', function(StokDataTable $dataTable) {
	return $dataTable->render('stok.index');
});

Route::get('barang-data', 'BarangController@daftar')->name('barang.data');
Route::get('brg-data', 'BarangController@json')->name('barang.json');
Route::get('getbarang', 'Api\DataController@barangtojson')->name('barang.json');
Route::get('getbarang/{idbr}', 'Api\DataController@barangshow');
Route::get('getstok', 'Api\DataController@stoktojson');
Route::get('getstoklite', 'Api\DataController@stoklitetojson')->name('stoklite.json');
Route::get('getkontak', 'Api\DataController@kontaktojson')->name('kontak.json');
Route::get('getkontak/{idkt}', 'Api\DataController@kontakshow');
Route::get('/btest2', function(){
	return new BarangResource(Barang::all());
});

Route::get('barang-json', function() {
	$model = App\Barang::query();
	$modelx = DataTables::eloquent($model)->only(['id','jual2','stok']);
	return response()->json(  $modelx );
});
Route::get('getemployee','Api\DataController@employeetojson');
Route::resource('kontak', 'KontakController');
Route::resource('barang', 'BarangController');
Route::put('updateproduk','Api\DataController@updateproduk');
Route::post('addemployee','Api\DataController@addemployee');
Route::post('updateemployee','Api\DataController@updateemployee');
Route::get('/simpanproduk','Api\DataController@simpanproduk');
Route::get('getproduk','Api\DataController@produktojson');
Route::get('getpiutangjs','Api\PiutangController@tojson');
Route::get('getpiutangjs/{id}','Api\PiutangController@detail');
Route::get('getkontakjs','Api\MinikontakController@tojson');
Route::get('getkontakjs/{id}','Api\MinikontakController@detail');

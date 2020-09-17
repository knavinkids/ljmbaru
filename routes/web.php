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
	$modelx = DataTables::eloquent($model)->only(['id','kode','jenis', 'nama','merk','jual2','jual4']);
	return response()->json(  $model );
});
Route::resource('kontak', 'KontakController');
Route::resource('barang', 'BarangController');

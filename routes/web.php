<?php

use Illuminate\Support\Facades\Route;
use App\DataTables\UsersDataTable;
use App\DataTables\StokDataTable;

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
Route::get('users', function(UsersDataTable $dataTable) {
    return $dataTable->render('users');
});
Route::get('stok', function(StokDataTable $dataTable) {
    return $dataTable->render('stok.index');
});

Route::get('kontak-data', 'KontakController@daftar')->name('kontak.data');
Route::resource('barang', 'BarangController');
Route::get('barang-data', 'BarangController@daftar')->name('barang.data');
Route::resource('kontak', 'KontakController');

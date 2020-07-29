<?php

use App\Http\Controllers\InventarisController;
use App\Mahasiswa;
use App\Peminjaman;
use App\Peruntukan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
// register dan login
Auth::routes();

// barang
Route::resource('barang', 'BarangController');

// sumber dana
Route::resource('sumberDana', 'SumberDanaController');

// Peruntukan
Route::resource('peruntukan', 'PeruntukanController');

// Lab
Route::resource('lab', 'LabController');

// Peminjaman
Route::resource('peminjaman', 'PeminjamanController');
Route::get('peminjaman/tambah/$id','PeminjamanController@tambahBrg');
Route::get('peminjaman/data/keranjang','PeminjamanController@dataKeranjang')->name('get.datatables.ker');
Route::get('peminjaman/tambah-barang/{id}','PeminjamanController@tambahKeranjang');
Route::get('peminjaman/hapus-barang/{id}','PeminjamanController@hapusBarang');


// Mahasiswa
Route::resource('mahasiswa', 'MahasiswaController');

//Dosen
Route::resource('dosen', 'DosenController');

//inventaris tambah lab dan dosen
Route::get('inventaris/dua', 'InventarisController@createDua')->name('inventaris.createDua');

//inventaris
Route::resource('inventaris', 'InventarisController');

Route::get('dashboard',function(){
    return view('contents.dashboard');
});

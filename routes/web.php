<?php

use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

<<<<<<< HEAD
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/barang', function () {
//     return view('barang');
// });


// Route::get('dashboard', [UhomeController::class, 'index'])->middleware('auth');
Route::get('dashboard', [MasterController::class, 'dashboard']);
Route::get('barang', [MasterController::class, 'barang']);



// Barang
Route::post('barang/input', [MasterController::class, 'inputBarang']);
Route::post('barang/saveEdit', [MasterController::class, 'saveBarang']);

// API - Barang
Route::get('barang/delete', [MasterController::class, 'deleteBarang']);

=======
Route::get('/admin/dashboard', 'App\Http\Controllers\DashboardController@index')->name('admin.dashboard');

Route::get('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@index')->name('admin.tahun_anggaran');
Route::get('/admin/tahun-anggaran/create', 'App\Http\Controllers\TahunAnggaranController@create')->name('admin.tahun_anggaran.create');
Route::post('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@add')->name('admin.tahun_anggaran.add');
Route::put('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@update')->name('admin.tahun_anggaran.update');
>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d

<?php


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

Route::get('/admin/dashboard', 'App\Http\Controllers\DashboardController@index')->name('admin.dashboard');
Route::get('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@index')->name('admin.tahun_anggaran');
Route::get('/admin/tahun-anggaran/create', 'App\Http\Controllers\TahunAnggaranController@create')->name('admin.tahun_anggaran.create');
Route::post('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@add')->name('admin.tahun_anggaran.add');
Route::put('/admin/tahun-anggaran', 'App\Http\Controllers\TahunAnggaranController@update')->name('admin.tahun_anggaran.update');
Route::get('/admin/bidang', 'App\Http\Controllers\BidangController@index')->name('admin.bidang');
Route::get('/admin/bidang/create', 'App\Http\Controllers\BidangController@create')->name('admin.bidang.create');
Route::post('/admin/bidang', 'App\Http\Controllers\BidangController@add')->name('admin.bidang.add');
Route::put('/admin/bidang', 'App\Http\Controllers\BidangController@update')->name('admin.bidang.update');
Route::delete('/admin/bidang', 'App\Http\Controllers\BidangController@delete')->name('admin.bidang.delete');
Route::get('/admin/bidang-anggaran', 'App\Http\Controllers\BidangAnggaranController@index')->name('admin.bidang_anggaran');
Route::get('/admin/bidang-anggaran/create', 'App\Http\Controllers\BidangAnggaranController@create')->name('admin.bidang_anggaran.create');
Route::post('/admin/bidang-anggaran', 'App\Http\Controllers\BidangAnggaranController@add')->name('admin.bidang_anggaran.add');
Route::put('/admin/bidang-anggaran', 'App\Http\Controllers\BidangAnggaranController@update')->name('admin.bidang_anggaran.update');
Route::delete('/admin/bidang-anggaran', 'App\Http\Controllers\BidangAnggaranController@delete')->name('admin.bidang_anggaran.delete');

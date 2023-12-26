<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\UserController;
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

// Unit Kerja
Route::get('admin/unit-kerja', [UnitKerjaController::class, 'unit_kerja'])->name('UnitKerja');
Route::get('admin/unit-kerja/add', [UnitKerjaController::class, 'add'])->name('FormTambahUnitKerja');
Route::post('admin/unit-kerja/doAdd', [UnitKerjaController::class, 'doAdd'])->name('doAddUnitKerja');

Route::get('admin/unit-kerja/get', [UnitKerjaController::class, 'get'])->name('GetEditDataUnitKerja');
Route::post('admin/unit-kerja/update', [UnitKerjaController::class, 'update'])->name('UpdateUnitKerja');
Route::post('admin/unit-kerja/delete', [UnitKerjaController::class, 'delete'])->name('DeleteUnitKerja');

// User
Route::get('admin/users', [UserController::class, 'users'])->name('dataUser');
Route::get('admin/users/add', [UserController::class, 'add'])->name('FormTambahUser');
Route::post('admin/users/doAdd', [UserController::class, 'doAdd'])->name('doAddUser');

Route::get('admin/users/get', [UserController::class, 'get'])->name('GetEditDataUser');
Route::post('admin/users/update', [UserController::class, 'update'])->name('UpdateUser');
Route::post('admin/users/delete', [UserController::class, 'delete'])->name('DeleteUser');

// JENIS ANGGARAN
Route::get('/admin/jenis-anggaran', 'App\Http\Controllers\JenisAnggaranController@index')->name('admin.jenis_anggaran');
Route::get('/admin/jenis-anggaran/create', 'App\Http\Controllers\JenisAnggaranController@create')->name('admin.jenis_anggaran.create');
Route::post('/admin/jenis-anggaran/add', 'App\Http\Controllers\JenisAnggaranController@add')->name('admin.jenis_anggaran.add');
Route::post('/admin/jenis-anggaran', 'App\Http\Controllers\JenisAnggaranController@delete')->name('admin.jenis_anggaran.delete');
Route::put('/admin/jenis-anggaran', 'App\Http\Controllers\JenisAnggaranController@update')->name('admin.jenis_anggaran.update');

// SUB ANGGARAN
Route::get('/admin/sub-anggaran', 'App\Http\Controllers\SubAnggaranController@index')->name('admin.sub_anggaran');
Route::get('/admin/sub-anggaran/create', 'App\Http\Controllers\SubAnggaranController@create')->name('admin.sub_anggaran.create');
Route::get('/admin/sub-anggaran/lihat/{uuid}', 'App\Http\Controllers\SubAnggaranController@lihat')->name('admin.sub_anggaran.lihat');
Route::post('/admin/sub-anggaran/add/', 'App\Http\Controllers\SubAnggaranController@add')->name('admin.sub_anggaran.add');
Route::get('/admin/sub-anggaran/edit/{uuid}', 'App\Http\Controllers\SubAnggaranController@edit')->name('admin.sub_anggaran.edit');
Route::post('/admin/sub-anggaran', 'App\Http\Controllers\SubAnggaranController@delete')->name('admin.sub_anggaran.delete');
Route::put('/admin/sub-anggaran', 'App\Http\Controllers\SubAnggaranController@update')->name('admin.sub_anggaran.update');

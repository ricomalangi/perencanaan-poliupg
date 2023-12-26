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

// Iku
Route::get('/admin/iku', 'App\Http\Controllers\IkuController@iku')->name('admin.iku');
Route::get('/admin/iku/add', 'App\Http\Controllers\IkuController@add')->name('admin.iku.add');
Route::post('/admin/iku/doAdd', 'App\Http\Controllers\IkuController@doAdd')->name('admin.iku.doAdd');

Route::get('/admin/iku/get', 'App\Http\Controllers\IkuController@get')->name('admin.iku.GetData');
Route::post('/admin/iku/update', 'App\Http\Controllers\IkuController@update')->name('admin.iku.update');
Route::post('/admin/iku/delete', 'App\Http\Controllers\IkuController@delete')->name('admin.iku.delete');
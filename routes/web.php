<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\UnitKerjaController;
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

// Unit Unit Kerja
Route::get('admin/unit-kerja', [UnitKerjaController::class, 'unit_kerja'])->name('UnitKerja');
Route::get('admin/unit-kerja/add', [UnitKerjaController::class, 'add'])->name('FormTambahUnitKerja');
Route::post('admin/unit-kerja/doAdd', [UnitKerjaController::class, 'doAdd'])->name('doAddUnitKerja');

Route::get('admin/unit-kerja/get', [UnitKerjaController::class, 'get'])->name('GetEditData');
Route::post('admin/unit-kerja/update', [UnitKerjaController::class, 'update'])->name('UpdateUnitKerja');
Route::post('admin/unit-kerja/delete', [UnitKerjaController::class, 'delete'])->name('DeleteUnitKerja');

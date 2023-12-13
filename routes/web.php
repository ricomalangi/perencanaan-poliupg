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


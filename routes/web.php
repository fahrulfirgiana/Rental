<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SopirControllers;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

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

// Route::get('welcome', function () {
//     return view('welcome');
// });

//untuk memanggil produk controller
Route::resource('produk', ProdukController::class);

//untuk memanggil sopir controller
Route::resource('sopir', SopirControllers::class);

//untuk memanggil sopir controller
Route::resource('peminjaman', PeminjamanController::class);

Route::resource('dashboard', DashboardController::class)->middleware('isLogin');
Route::get('/sesi/awal', [SessionController::class, 'awal'])->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');
Route::get('/cari', [PeminjamanController::class, 'cari']);

Route::get('/cari', [PeminjamanController::class, 'cari']);

Route::get('/', function () {
    return view('sesi/welcome');
})->middleware('isTamu');

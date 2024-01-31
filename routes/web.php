<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TokoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('user', UserController::class);
Route::resource('product', ProductController::class);

Route::post('bank', [BankController::class, 'bank'])->name('bank');
Route::post('siswa', [SiswaController::class, 'siswa'])->name('siswa');

Route::post('banktopup', [BankController::class, 'bankTopUp'])->name('banktopup');
Route::post('bankwithdrawal', [BankController::class, 'bankWithDrawal'])->name('bankwithdrawal');

Route::post('lanjutproduk', [SiswaController::class, 'lanjutProduk'])->name('lanjutproduk');
Route::get('confirmbuy', [SiswaController::class, 'confirmBuy'])->name('confirmbuy');
Route::delete('tidakjadi/{transaction}', [SiswaController::class, 'tidakJadi'])->name('tidakjadi');
Route::post('bayartransaksi', [SiswaController::class, 'bayarTransaksi'])->name('bayartransaksi');
Route::post('lanjuttransaksi', [TokoController::class, 'lanjutTransaksi'])->name('lanjuttransaksi');

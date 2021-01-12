<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CarouselController;
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




require __DIR__.'/auth.php';
Route::get('/', [PageController::class,'index'])->name('page');



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])
    ->name('dashboard');
    Route::resource('User.setting', SettingController::class)
    ->shallow();
    Route::resource('Transaksi', TransaksiController::class)
    ->shallow();
    Route::resource('Buyer', BuyerController::class);
    Route::resource('Seller', SellerController::class);
    Route::resource('Profile', SellerController::class);
});

Route::middleware(['auth', 'PageAccess:admin'])->group(function () {
    Route::resource('User', UserController::class);
    Route::resource('Carousel', CarouselController::class);
});

Route::middleware(['auth', 'PageAccess:seller,buyer'])->group(function () {
    Route::resource('User.profile', ProfileController::class)
    ->shallow();
});

Route::middleware(['auth', 'PageAccess:seller'])->group(function () {
    Route::resource('seller.produk', ProdukController::class)
    ->shallow();
});

Route::middleware(['auth', 'PageAccess:buyer'])->group(function () {
    Route::get('/pembeli', function () {   
        return view('pembeli.dashboard');
    })->name('pembeliDashboard');
    Route::resource('pembeli.htransaksi', BuyController::class)
    ->shallow();
});

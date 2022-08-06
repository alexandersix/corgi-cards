<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CardController::class, 'index'])->name('dashboard');
    Route::get('/cards/{card}', [CardController::class, 'show'])->name('card.show');

    Route::get('/auction', [AuctionController::class, 'index'])->name('auction.index');
    Route::get('/auction/{card}', [AuctionController::class, 'create'])->name('auction.create');
    Route::post('/auction', [AuctionController::class, 'store'])->name('auction.store');
    Route::get('/auction/{auction}/create-bid', [AuctionController::class, 'createBid'])->name('auction.create-bid');
    Route::post('/auction/{auction}/place-bid', [AuctionController::class, 'storeBid'])->name('auction.place-bid');
    Route::post('/auction/{auction}/buyout', [AuctionController::class, 'storeBuyout'])->name('auction.buyout');
});

require __DIR__.'/auth.php';

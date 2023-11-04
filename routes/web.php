<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard-item', function () {
    return view('layouts.dashboard.index');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // User
    Route::get('/data-user', [UserController::class, 'index'])->name('data.user');
    Route::get('/create-suplier', [UserController::class, 'create_suplier'])->name('input.suplier');
    Route::post('/store-suplier', [UserController::class, 'store'])->name('store.suplier');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete(
        '/user/{id}',
        [UserController::class, 'destroy']
    )->name('user.destroy');

    // Item
    Route::get('/data-item', [ItemController::class, 'index'])->name('data.item');
    Route::get('/create-item', [ItemController::class, 'create'])->name('create.item');
    Route::post('/store-item', [ItemController::class, 'store'])->name('store.item');
    Route::get('/item/{id}', [ItemController::class, 'detail'])->name('item.detail');
    Route::post('/item/{id}/update', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    // Transaction
    Route::get('/data-transaction', [TransactionController::class, 'index'])->name('dashboard.transaction');
    Route::get('/bill-suplier', [TransactionController::class, 'create_inbound'])->name('create.suplier');
    Route::post('/transaction-suplier', [TransactionController::class, 'store_bill_suplier'])->name('transaction.suplier');
    Route::get('/bill-customer', [TransactionController::class, 'create_outbound'])->name('create.customer');
    Route::post('/transaction-customer', [TransactionController::class, 'store_bill_customer'])->name('transaction.customer');


    // ... Rute-rute lain yang memerlukan otentikasi di sini
});

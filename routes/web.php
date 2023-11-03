<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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

Route::get('/dashboard-item', function(){
    return view('layouts.dashboard.index');
});

Route::get('/data-item', [ItemController::class, 'index'])->name('data.item');
Route::get('/create-item', [ItemController::class, 'create'])->name('create.item');
Route::post('/store-item', [ItemController::class, 'store'])->name('store.item');

Route::get('/data-user', [UserController::class, 'index'])->name('data.user');
Route::get('/create-suplier', [UserController::class, 'create_suplier'])->name('input.suplier');
Route::post('/store-suplier', [UserController::class, 'store'])->name('store.suplier');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



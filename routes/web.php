<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::prefix('/medicine')->name('medicine.')->group(function () {
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');
    Route::get('/', [MedicineController::class, 'index'])->name('home');
    Route::get('/stock', [MedicineController::class, 'stock'])->name('stock');
    Route::get('/{id}', [MedicineController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [MedicineController::class, 'update'])->name('update');
    Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('delete');
    Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
    Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
});


Route::prefix('/users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});

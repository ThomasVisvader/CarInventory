<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cars', [CarsController::class, 'index'])->name('cars.list');
Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');
Route::post('/cars/create', [CarsController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}/edit', [CarsController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}/edit', [CarsController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarsController::class, 'delete'])->name('cars.delete');

Route::get('/parts', [PartsController::class, 'index'])->name('parts.list');
Route::get('/parts/create', [PartsController::class, 'create'])->name('parts.create');
Route::post('/parts/create', [PartsController::class, 'store'])->name('parts.store');
Route::get('/parts/{part}/edit', [PartsController::class, 'edit'])->name('parts.edit');
Route::put('/parts/{part}/edit', [PartsController::class, 'update'])->name('parts.update');
Route::delete('/parts/{part}', [PartsController::class, 'delete'])->name('parts.delete');

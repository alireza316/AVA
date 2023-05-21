<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;

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

Route::get('/login', [UserController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [UserController::class, 'getRegister']);
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');

Route::get('/menu', [FoodController::class, 'getMenu'])->name('getMenu');
Route::post('/menu', [FoodController::class, 'postMenu'])->name('postMenu');

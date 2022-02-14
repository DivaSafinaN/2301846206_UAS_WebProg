<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Ebook;
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

Route::get('/', [AllController::class,'before']);

Route::get('/sign-up', [RegisterController::class,'sign_up'])->middleware('guest');
Route::post('/sign-up', [RegisterController::class,'store']);

Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout'])->middleware('auth');;
Route::get('/logout-page', [LoginController::class,'logout_page']);

Route::get('/home', [AllController::class,'home'])->middleware('auth');
Route::get('/books/{ebook:title}', [AllController::class,'index'])->middleware('auth');

Route::get('/account-maintenance', [AdminController::class,'registered'])->middleware('admin');
Route::get('/account-maintenance/{id}', [AdminController::class,'edit'])->middleware('admin');
Route::put('/account-maintenance/update/{id}', [AdminController::class,'update'])->middleware('admin');
Route::delete('/account-delete/{id}', [AdminController::class,'destroy'])->middleware('admin');

Route::get('/profile', [ProfileController::class,'edit'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class,'update'])->middleware('auth');

Route::post('/order/{id}', [OrderController::class,'order'])->middleware('auth');
Route::get('cart', [OrderController::class,'cart'])->middleware('auth');
Route::delete('/order-delete/{id}', [OrderController::class,'destroy'])->middleware('auth');
Route::get('/order/submit', [OrderController::class,'submit'])->middleware('auth');

Route::get('/success', [AllController::class,'success'])->middleware('auth');
Route::get('/saved', [AllController::class,'saved'])->middleware('auth');

if (file_exists(app_path('Http/Controllers/LocalizationController.php')))
{
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class , 'lang']);
}
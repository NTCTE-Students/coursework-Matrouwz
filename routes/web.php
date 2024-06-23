<?php

use App\Models\User;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/register', [ViewsController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [ViewsController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [ActionsController::class, 'register']);
Route::post('/login', [ActionsController::class, 'login']);
Route::get('/logout', [ActionsController::class, 'logout'])->name('logout')->middleware('auth');
// Route::get('/profile', [ViewsController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/gift/{gift}', [ViewsController::class, 'gift'])->name('gift.show');
Route::get('/checks', [ViewsController::class, 'checks'])->name('checks')->middleware('auth');
Route::post('/checkout/{gift}', [OrderController::class, 'checkout'])->name('check.checkout')->middleware('auth');
Route::post('/checks/{id}/review', [ActionsController::class, 'create_review'])->name('checks.review')->middleware('auth');

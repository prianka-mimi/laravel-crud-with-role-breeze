<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// my custom part start
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RecycleBinController;
// my custom part end

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// my custom part start
Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit', [UserController::class, 'edit']);
Route::get('dashboard/user/view/{id}', [UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::post('dashboard/user/softdelete', [UserController::class, 'softdelete']);
Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']);

Route::get('dashboard/banner', [BannerController::class, 'index']);
Route::get('dashboard/banner/add', [BannerController::class, 'add']);
Route::get('dashboard/banner/edit/{slug}', [BannerController::class, 'edit']);
Route::get('dashboard/banner/view/{slug}', [BannerController::class, 'view']);
Route::post('dashboard/banner/submit', [BannerController::class, 'insert']);
Route::post('dashboard/banner/update', [BannerController::class, 'update']);
Route::post('dashboard/banner/softdelete', [BannerController::class, 'softdelete']);
Route::post('dashboard/banner/restore', [BannerController::class, 'restore']);
Route::post('dashboard/banner/delete', [BannerController::class, 'delete']);

Route::get('dashboard/recycle', [RecycleBinController::class, 'index']);
Route::get('dashboard/recycle/user', [RecycleBinController::class, 'user']);
Route::get('dashboard/recycle/banner', [RecycleBinController::class, 'banner']);
// my custom part end

require __DIR__.'/auth.php';

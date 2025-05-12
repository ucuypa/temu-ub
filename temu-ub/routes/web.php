<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\AnnouncementController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost-items.create');
    Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost-items.store');
    Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');
});

Route::resource('announcements', AnnouncementController::class);
require __DIR__.'/auth.php';

Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');

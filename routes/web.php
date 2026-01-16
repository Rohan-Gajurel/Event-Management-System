<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::get('/admin', function () {
    return view('admin.layout');
})->middleware(['auth'])->name('dashboard');

Route::prefix('category')->middleware(['auth'])->controller(CategoryController::class)->group(function()
{
    Route::get('/','index')->name('category.index');
    Route::get('/create', 'create' )->name('category.create');
    Route::post('/', 'store')->name('category.store');
    Route::get('/{id}', 'edit')->name('category.edit');
    Route::put('/{id}', 'update')->name('category.update');
    Route::delete('/{id}', 'destroy')->name('category.delete');
});

Route::prefix('venue')->middleware(['auth'])->controller(VenueController::class)->group(function()
{
    Route::get('/','index')->name('venue.index');
    Route::get('/create', 'create' )->name('venue.create');
    Route::post('/', 'store')->name('venue.store');
    Route::get('/{id}', 'edit')->name('venue.edit');
    Route::put('/{id}', 'update')->name('venue.update');
    Route::delete('/{id}', 'destroy')->name('venue.delete');
});

require __DIR__.'/auth.php';

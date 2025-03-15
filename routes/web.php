<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsSystemAdministrator;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', IsSystemAdministrator::class])->group(function () {
    Route::resource('/sport-classes', SportClassController::class);
});

require __DIR__.'/auth.php';

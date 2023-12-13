<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
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





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('dashboard');
});

Route::prefix('doctor')->middleware('auth')->group(function () {
    // Rotta per mostrare il form di creazione di un nuovo progetto
    Route::get('/create', [DoctorController::class, 'create'])->name('doctor.create');

    // Rotta per salvare un nuovo progetto nel database
    Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');

    Route::get('/show/{profile}', [DoctorController::class, 'show'])->name('doctor.show');
    Route::get('/{profile}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::patch('/update/{profile}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/destroy', [DoctorController::class, 'destroy'])->name('doctor.destroy');
});

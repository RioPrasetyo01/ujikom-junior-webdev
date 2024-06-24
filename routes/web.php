<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/dashboard', function () {
    $data['title'] = 'Dashboard';
    $data['breadcrumbs'] = [
        [
            'title' => 'Dashboard',
            'url' => route('dashboard')
        ]
    ];

    // Mendapatkan user yang sedang login
    $data['user'] = Auth::user();

    return view('pages.dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/employees', [PegawaiController::class, 'index'])->name('employees.index');
    Route::get('/details', [PegawaiController::class, 'details'])->name('employees.details');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ambulances', AmbulanceController::class);
Route::resource('dispatches', DispatchController::class);
Route::resource('patients', PatientController::class);

// Route::get('/dashboard', [AmbulanceController::class, 'index'])->name('dashboard');

Route::get('/ambulances', [AmbulanceController::class, 'index'])->name('ambulances.index');
Route::get('/add-patient', [PatientController::class, 'create'])->name('add.patient');
Route::get('/add-ambulance', [AmbulanceController::class, 'create'])->name('add.ambulance');
Route::get('/dispatch-patient', [DispatchController::class, 'create'])->name('dispatch.patient');
Route::post('/dispatch-patient', [DispatchController::class, 'store'])->name('dispatch.patient.store');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/dispatches', [DispatchController::class, 'index'])->name('dispatch.index');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

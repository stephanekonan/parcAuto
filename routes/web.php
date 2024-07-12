<?php

use App\Http\Middleware\IsAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PlaceController;
use App\Http\Controllers\Dashboard\VehiculeController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

// <= ==================== AUTH ROUTES ============================ =>

Route::middleware([RedirectIfAuthenticated::class])->group(
    function () {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::get('/auth/login', [AuthController::class, 'login'])->name('login.index');
        Route::post('/auth/login', [AuthController::class, 'loginStore'])->name('login.store');
        Route::get('/auth/register', [AuthController::class, 'register'])->name('register.index');
        Route::post('/auth/register', [AuthController::class, 'registerStore'])->name('register.store');
    }
);

Route::get('/error/connexion', [AuthController::class, 'errorConnexion'])->name('error.connexion');

// <= ==================== DASHBOARD ROUTES ============================ =>

Route::middleware([IsAuth::class])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/vehicules', [VehiculeController::class, 'index'])->name('dashboard.vehicules');
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/dashboard/places', [PlaceController::class, 'index'])->name('dashboard.users');

    Route::get('/vehicule/create', [VehiculeController::class, 'create'])->name('vehicule.create');
    Route::post('/vehicule/store', [VehiculeController::class, 'store'])->name('vehicule.store');
    Route::get('/vehicule/edit/{id}', [VehiculeController::class, 'edit'])->name('vehicule.edit');
    Route::put('/vehicule/update/{id}', [VehiculeController::class, 'update'])->name('vehicule.update');
    Route::get('/vehicule/delete/{id}', [VehiculeController::class, 'delete'])->name('vehicule.delete');

    Route::post('/place/store', [PlaceController::class, 'store'])->name('place.store');
    Route::get('/place/edit/{id}', [PlaceController::class, 'edit'])->name('place.edit');
    Route::put('/place/update/{id}', [PlaceController::class, 'update'])->name('place.update');
    Route::get('/place/delete/{id}', [PlaceController::class, 'delete'])->name('place.delete');
});

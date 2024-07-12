<?php

use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/statistics/vehicules', [HomeController::class, 'getNbreVehiculeOnTwoWeek']);

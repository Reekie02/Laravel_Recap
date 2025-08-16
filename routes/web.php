<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/home', [PublicController::class, 'home'])->name('homepage');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

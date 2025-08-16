<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [PublicController::class, 'home'])->name('homepage');

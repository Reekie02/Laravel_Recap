<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PokemonController;

Route::get('/home', [PublicController::class, 'home'])->name('homepage');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemons.create');
Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemons.store');
Route::get('/pokemon/{name}', [PokemonController::class, 'show'])->name('pokemons.show');

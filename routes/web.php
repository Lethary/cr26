<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'home'])->name('home'); // accueil

Route::get('/mentions', [PageController::class, 'mentions'])->name('mentions');

Route::get('/classement', [PageController::class, 'classement'])->name('classement');

Route::get('/edition', [PageController::class, 'edition'])->name('edition');

Route::get('/exportation', [PageController::class, 'exportation'])->name('exportation');
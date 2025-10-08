<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('accueil');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/mentions', [PageController::class, 'mentions']);

Route::get('/classement', [PageController::class, 'classement']);

Route::get('/edition', [PageController::class, 'edition']);

Route::get('/exportation', [PageController::class, 'exportatin']);

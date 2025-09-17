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
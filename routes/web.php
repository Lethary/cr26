<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\ClassementController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GestionEleveController;

use Livewire\Volt\Volt;

// Accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Collèges
// Route::get('/colleges/eleves', [PageController::class, 'eleves'])->name('colleges.eleves');
Route::get('/colleges/equipe', [PageController::class, 'equipe'])->name('colleges.equipe');

// Profile
Route::view('profile', 'profile')->name('profile');

// Formulaire d'ajout d'un élève (sans auth)
Route::get('ajout_eleve', [GestionEleveController::class, 'create'])->name('ajout_eleve');
Route::post('ajout_eleve', [GestionEleveController::class, 'store'])->name('ajout_eleve.store');

// Liste des élèves
Route::get('/colleges/eleves', [GestionEleveController::class, 'consulter'])->name('colleges.eleves');
Route::post('/colleges/eleves', [GestionEleveController::class, 'delete'])->name('gestion_eleve.delete');



// Formulaire de modification d'un élève (sans auth)
Route::get('modification_eleve/{eleve}', [GestionEleveController::class, 'edit'])->name('modification_eleve');
Route::put('modification_eleve/{eleve}', [GestionEleveController::class, 'update'])->name('modification_eleve.update');
// Épreuves
Route::get('/epreuves', [PageController::class, 'epreuves'])->name('epreuves.index');

// Classement
Route::get('/classement', [PageController::class, 'classement'])->name('classement.index');

// Édition
Route::get('/edition/2024', [PageController::class, 'show2024'])->name('edition.2024');
Route::get('/edition/2025', [PageController::class, 'show2025'])->name('edition.2025');

// Saisie Note
Route::post('/concours/block-saisie', [ConcourController::class, 'blockSaisie'])->middleware(['gestionnaire'])
    ->name('concours.block');
Route::get('/saisie-note', [PageController::class, 'saisie'])->middleware(['gestionnaire'])
    ->middleware('concour.enCours')
    ->name('saisieNote.index');


// Page Gestion

Route::post('/gestion/classement/publier', [ClassementController::class, 'publier'])
    ->name('classement.publish');
Route::get('/gestion/classement-provisoire', [PageController::class, 'classementProvisoire'])
    ->name('gestion.classement.provisoire');
 Route::get('/gestion/export-classement-final', [ExportController::class, 'exportClassementFinal'])
 ->name('export.classement.final');
 Route::get('/gestion/envoyer-classement-final', [ExportController::class, 'envoyerClassementFinal'])
 ->name('classement.envoyer');

Route::prefix('gestion')->middleware(['gestionnaire'])->group(function () {
    Route::get('/epreuves', [PageController::class, 'epreuves'])->name('gestion.epreuves');
    Route::get('/colleges', [PageController::class, 'colleges'])->name('gestion.colleges');
    Route::get('/abonnement', [PageController::class, 'abonnement'])->name('gestion.abonnement');
    Route::get('/role', [PageController::class, 'role'])->name('gestion.role');
    Route::get('/edition', [PageController::class, 'edition'])->name('gestion.edition');
    Route::get('/exportation', [PageController::class, 'exportation'])->name('gestion.exportation');
    Route::get('/modification', [PageController::class, 'modification'])->name('gestion.modification');
    Route::get('/classement-provisoire', [PageController::class, 'classementProvisoire'])
        ->name('gestion.classement.provisoire');
});

// Page Admin
Route::prefix('admin')->middleware(['admin'])->group(function () {

    Route::get('/genre', [PageController::class, 'genre'])->name('admin.genre');
    Route::get('/pays', [PageController::class, 'pays'])->name('admin.pays');
    Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('admin.utilisateurs');

});

// Connexion
Volt::route('login', 'pages.auth.login')->name('login');
Volt::route('register', 'pages.auth.register')->name('register');
Volt::route('logout', 'pages.auth.logout')->name('logout');


Route::resource('users', UserController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

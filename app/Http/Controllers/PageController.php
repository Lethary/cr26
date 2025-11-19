<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\UserController;

use App\Models\Classer;
use App\Models\User;
use App\Models\Concour;

class PageController extends Controller
{
    public function home(): View
    {
        return view('accueil');
    }

    public function eleves(): View
    {
        return view('colleges.eleves');
    }
    public function equipe(): View
    {
        return view('colleges.equipe');
    }
    public function epreuves(): View
    {
        return view('epreuves');
    }

    public function classement(): View
    {
        $concour = \App\Models\Concour::where('actif', 1)->first();

        // 🔵 1. Concours en cours → pas de classement
        if ($concour && $concour->en_cours == 1) {
            return view('classement-message', [
                'message' => "Le concours est en cours, le classement final n'est pas encore disponible."
            ]);
        }

        // 🟡 2. Saisie bloquée mais pas encore publié
        $flagPath = storage_path('app/classement_publie.flag');
        if (!file_exists($flagPath)) {
            return view('classement-message', [
                'message' => "La saisie est terminée. Le classement final sera publié prochainement."
            ]);
        }

        // 🟢 3. Flag trouvé → classement final publié
        $scores = \App\Models\Classer::getScoresByCategorie();

        return view('classement', compact('scores'));
    }




    public function show2024(): View
    {
        return view('edition.2024');
    }
    public function show2025(): View
    {
        return view('edition.2025');
    }

    public function saisie(): View
    {
        return view('saisie-note');
    }

    public function epreuvesGestion(): View
    {
        return view('gestion.epreuves');
    }
    public function colleges(): View
    {
        return view('gestion.colleges');
    }
    public function abonnement(): View
    {
        return view('gestion.abonnement');
    }
    public function role(): View
    {
        return view('gestion.role');
    }
    public function edition(): View
    {
        $concour = Concour::where('actif', 1)->first();

        return view('gestion.edition', compact('concour'));
    }
    public function exportation(): View
    {
        return view('gestion.exportation');
    }
    public function modification(): View
    {
        return view('gestion.modification');
    }

    public function genre(): View
    {
        return view('admin.genre');
    }
    public function pays(): View
    {
        return view('admin.pays');
    }
    public function utilisateurs(): View
    {
        return view('admin.utilisateurs');
    }
    public function classementProvisoire(): View
    {
        // Toujours recalculer le provisoire
        UserController::MiseAJourClassement();

        $scores = Classer::getScoresByCategorie();

        return view('gestion.classement-provisoire', compact('scores'));
    }
}

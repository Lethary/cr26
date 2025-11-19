<?php

namespace App\Http\Controllers;

use App\Models\Concour;

class ClassementController extends Controller
{
    public function publier()
    {
        $concour = Concour::where('actif', 1)->first();

        if (!$concour) {
            return back()->with('error', 'Aucun concours actif trouvé.');
        }

        // 🔒 Vérifier que la saisie est bloquée
        if ($concour->en_cours == 1) {
            return back()->with('error', 'Vous devez bloquer la saisie avant de pouvoir publier.');
        }

        // 🟢 Créer un fichier flag dans storage pour indiquer que le classement est publié
        $flagPath = storage_path('app/classement_publie.flag');
        file_put_contents($flagPath, 'published');

        return back()->with('success', 'Le classement final a été publié !');
    }
}

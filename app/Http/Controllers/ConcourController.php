<?php

namespace App\Http\Controllers;

use App\Models\Concour;

class ConcourController extends Controller
{
    public function blockSaisie()
    {
        // Récupérer le concours actif
        $concour = Concour::where('actif', 1)->first();

        if (!$concour) {
            return back()->with('error', 'Aucun concours actif trouvé.');
        }

        // Mettre en_cours à 0
        $concour->update([
            'en_cours' => 0
        ]);

        return back()->with('success', 'La saisie est maintenant bloquée.');
    }
}

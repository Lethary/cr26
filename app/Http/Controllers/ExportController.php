<?php

namespace App\Http\Controllers;

use App\Models\Classer;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportClassementFinal()
    {
        // Récupération classement final (catégorie 99)
        $scores = Classer::with('equipe.college')
            ->where('id_categorie', 99)
            ->orderByDesc('score_total')
            ->get();

        $filename = "classement_final.csv";

        // Ouvre un flux mémoire
        $handle = fopen('php://temp', 'r+');

        // En-tête CSV
        fputcsv($handle, ['Rang', 'Équipe', 'Collège', 'Score total','Site'], ';');

        $rang = 1;
        foreach ($scores as $score) {
            $site = $score->equipe->site ?? '';
            fputcsv($handle, [
                $rang++,
                $score->equipe->nom,
                $score->equipe->college->nom,
                $score->score_total,
                $site
            ], ';');
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return response($content)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }
}

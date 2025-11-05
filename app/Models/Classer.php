<?php

namespace App\Models;

use App\Models\Base\Classer as BaseClasser;
use Illuminate\Support\Facades\DB;


class Classer extends BaseClasser
{
    protected $table = 'classer';
    protected $fillable = [
        'score_total',
        'commentaire'
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }

    // Récupérer tous les scores pour une catégorie donnée
    public static function getScoresByCategorie()
    {
        return self::with('equipe.college')
            ->where('id_categorie', 99)
            ->orderByDesc('score_total')
            ->get();
    }
    public static function updateClassement()
    {
        // Définition des plages d'épreuves par catégorie
        $categories = [
            1 => range(1, 8),
            2 => [9],
            3 => [10, 11],
        ];

        // On récupère toutes les équipes
        $equipes = DB::table('equipes')->get();

        foreach ($equipes as $equipe) {
            $scoresCategorie = [];

            // --- Calcul pour chaque catégorie ---
            foreach ($categories as $idCategorie => $epreuvesIds) {
                $total = DB::table('scorer as s')
                    ->join('epreuves as e', 's.id_epreuve', '=', 'e.id')
                    ->where('s.id_equipe', $equipe->id)
                    ->whereIn('s.id_epreuve', $epreuvesIds)
                    ->selectRaw('SUM(s.score * e.coefficient) as total')
                    ->value('total');

                $total = $total ?? 0;
                $scoresCategorie[$idCategorie] = $total;

                // Insert ou update la table classer
                DB::table('classer')->updateOrInsert(
                    [
                        'id_equipe' => $equipe->id,
                        'id_categorie' => $idCategorie
                    ],
                    [
                        'score_total' => $total
                    ]
                );
            }

            // --- Catégorie 99 = cumul de tout ---
            $totalGlobal = array_sum($scoresCategorie);

            DB::table('classer')->updateOrInsert(
                [
                    'id_equipe' => $equipe->id,
                    'id_categorie' => 99
                ],
                [
                    'score_total' => $totalGlobal
                ]
            );
        }
    }
}

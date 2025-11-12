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
        // On récupère tous les scores groupés par équipe et catégorie
        $scores = DB::select("
        SELECT 
            s.id_equipe,
            e.id_categorie,
            SUM(s.score * e.coefficient) AS total
        FROM mcd_scorer s
        INNER JOIN mcd_epreuves e ON s.id_epreuve = e.id
        GROUP BY s.id_equipe, e.id_categorie
    ");

        $classement = [];

        // Organiser les scores par équipe
        foreach ($scores as $row) {
            $classement[$row->id_equipe][$row->id_categorie] = $row->total;
        }

        foreach ($classement as $idEquipe => $categories) {
            // Calcul du total global
            $totalGlobal = array_sum($categories);

            // Mise à jour de chaque catégorie
            foreach ($categories as $idCategorie => $total) {
                DB::select("
                INSERT INTO mcd_classer (id_equipe, id_categorie, score_total)
                VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE score_total = VALUES(score_total)
            ", [$idEquipe, $idCategorie, $total]);
            }

            // Catégorie 99 = total global
            DB::select("
            INSERT INTO mcd_classer (id_equipe, id_categorie, score_total)
            VALUES (?, 99, ?)
            ON DUPLICATE KEY UPDATE score_total = VALUES(score_total)
        ", [$idEquipe, $totalGlobal]);
        }
    }
}

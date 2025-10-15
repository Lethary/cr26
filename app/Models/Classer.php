<?php

namespace App\Models;

use App\Models\Base\Classer as BaseClasser;

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
    public static function getScoresByCategorie(int $idCategorie)
    {
        return self::with('equipe.college')
            ->where('id_categorie', $idCategorie)
            ->orderByDesc('score_total')
            ->get();
    }
}

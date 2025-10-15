<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipe;

class Classer extends Model
{
    protected $table = 'classer'; // car ma table ne suit pas la convention Laravel, elle est au singulier
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }

    // Récupérer les scores d'une catégorie
    public static function getScores()
    {
        return self::with('equipe.college')
            ->where('id_categorie', 99)
            ->orderByDesc('score_total')
            ->get();

    }
}

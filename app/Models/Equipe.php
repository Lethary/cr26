<?php

namespace App\Models;

use App\Models\Base\Equipe as BaseEquipe;

class Equipe extends BaseEquipe
{
    protected $table = 'equipes';
	protected $fillable = [
		'code',
		'nom',
		'site',
		'commentaire',
		'id_concours',
		'id_college'
	];
    public function college()
    {
        return $this->belongsTo(College::class, 'id_college', 'id');
    }

    // Relation vers les classements
    public function classements()
    {
        return $this->hasMany(Classer::class, 'id_equipe');
    }
}

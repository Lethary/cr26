<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public $timestamps = false;

    // Relation vers les équipes
    public function equipes()
    {
        return $this->hasMany(Equipe::class, 'code', 'code'); 
    }
}

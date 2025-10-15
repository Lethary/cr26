<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\College;

class Equipe extends Model
{
    public $timestamps = false;

    // Relation vers le collège
    public function college()
    {
        return $this->belongsTo(College::class, 'id_college', 'id'); 
    }

    // Relation vers Classer
    public function classements()
    {
        return $this->hasMany(Classer::class, 'id_equipe');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classer;

class ClassementController extends Controller
{
    function MiseAJourClassement()
    {
        Classer::updateClassement();
        return response()->json(['message' => 'Classement mis à jour avec succès.']);
    }
}

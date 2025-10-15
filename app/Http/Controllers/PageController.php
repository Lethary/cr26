<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Classer;

class PageController extends Controller
{
    function home(): View
    {
        return view('accueil');
    }
    function mentions(): View
    {
        return view('mentions');
    }

    public function classement(): View
    {
        $scores = Classer::getScoresByCategorie(99);
        return view('classement', compact('scores'));
    }

    function edition(): View
    {
        return view('edition');
    }

    function exportation(): View
    {
        return view('exportation');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    function mentions(): View {
        return view('mentions');
    }

    function classement(): View {
        return view('classement');
    }

    function edition(): View {
        return view('edition');
    }

    function exportation(): View {
        return view('exportation');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    function index() {
        return view('test');
    }

    function mentions(): View {
        return view('mentions');
    }

    
}

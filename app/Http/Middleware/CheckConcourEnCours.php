<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Concour;

class CheckConcourEnCours
{
    public function handle(Request $request, Closure $next)
{
    $concour = Concour::where('actif', 1)->first();

    if (!$concour || $concour->en_cours == 0) {
        return response()->view('saisie-bloquee', [
            'concour' => $concour
        ]);
    }

    return $next($request);
}
}

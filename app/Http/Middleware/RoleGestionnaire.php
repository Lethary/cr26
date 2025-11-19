<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleGestionnaire
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si utilisateur connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Récupérer rôle dans la table ENGAGER
        $role = DB::table('engager')
            ->where('id_utilisateur', Auth::id())
            ->value('id_role');

        // Si aucun rôle → interdit
        if (!$role) {
            abort(403, 'Accès interdit');
        }

        // Rôle Gestionnaire = 60
        if ((int)$role !== 60) {
            abort(403, 'Accès réservé au gestionnaire');
        }

        return $next($request);
    }
}

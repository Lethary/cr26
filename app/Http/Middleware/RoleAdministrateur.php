<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleAdministrateur
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier utilisateur connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Récupérer rôle dans ENGAGER
        $role = DB::table('engager')
            ->where('id_utilisateur', Auth::id())   // ✔ BON CHAMP SELON TON MCD
            ->value('id_role');

        // Si aucun rôle trouvé
        if (!$role) {
            abort(403, 'Accès interdit');
        }

        // Administrateur = 90
        if ((int)$role !== 90) {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return $next($request);
    }
}

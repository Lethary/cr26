<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class GestionEleveController extends Controller
{
    // Liste des élèves
    public function consulter(): View
    {
        $eleves = Utilisateur::whereIn('code_statut', ['N', 'A'])->get();
        return view('colleges.eleves', compact('eleves'));
    }

    // Formulaire de modification
    public function edit($id): View
    {
        $eleve = Utilisateur::findOrFail($id);

        // Charger l'email depuis le modèle User
        $eleve->email = $eleve->user->email ?? '';

        return view('modification_eleve', compact('eleve'));
    }

    // Mise à jour de l'élève
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:50',
        'prenom' => 'required|string|max:50',
        'classe' => 'required|string|max:10',
        'genre' => 'required|string|in:F,H,I',
        'email' => 'required|email',
    ]);

    // === TABLE users ===
    $user = User::findOrFail($id);
    $user->update([
        'name'  => $request->nom . ' ' . $request->prenom,
        'email' => $request->email,
    ]);

    // === TABLE utilisateurs ===
    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->update([
        'nom'         => $request->nom,
        'prenom'      => $request->prenom,
        'classe'      => $request->classe,
        'code_genre'  => $request->genre,
        'commentaire' => $request->email,
    ]);

    return redirect()->route('consulter')
                     ->with('success', 'Élève modifié avec succès !');
}


    // Formulaire d'ajout
    public function create(): View
    {
        return view('ajout_eleve');
    }


    
    public function delete(Request $request)
{
     $id = $request->input('delete_id');
   try {
        // Appelle la méthode statique du modèle User pour supprimer l'élève
        User::delete_eleve($id);

        $message = 'Élève supprimé avec succès.';
        $status = 'success';
    } catch (\Exception $e) {
        $message = 'Erreur lors de la suppression : ' . $e->getMessage();
        $status = 'error';
    }
    // Un seul return à la fin
    return redirect()->back()->with($status, $message);
}

    // Stockage d'un nouvel élève
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'classe' => 'required|string|max:10',
            'genre' => 'required|string|in:F,H,I',
            'email' => 'required|email|unique:users,email',
        ]);

        $password = Str::random(10);

        $email = $validated['email'];
        $nom = $validated['nom'] . ' ' . $validated['prenom'];
        $password = password_hash($password, PASSWORD_BCRYPT);

        $id = User::create_eleve($nom, $email, $password);
        

 
        
        
        $nom = $validated['nom'];
        $prenom = $validated['prenom'];
        $classe = $validated['classe'];
        $genre = $validated['genre'];
        $statut = 'N';
        $id_college = 1000;
        $id_equipe = null;
        $com = $validated['email'];
        Utilisateur::create_eleve($id, $nom, $prenom, $classe, $genre, $statut, $id_college, $id_equipe, $com);



        return redirect()->route('colleges.eleves')
                         ->with('success', 'Élève ajouté avec succès ! ');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utilisateur extends Model
{
    // ✅ Nom correct de la table
    protected $table = 'utilisateurs';
    
    protected $primaryKey = 'id';
    
    // ✅ Pas d'auto-increment car l'id vient de mcd_users
    public $incrementing = false;
    
    protected $keyType = 'int';
    
    // ✅ Toutes les colonnes qui peuvent être remplies
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'classe',
        'code_genre',
        'code_statut',
        'id_college',
        'id_equipe',
        'commentaire',
    ];
    
    // ✅ La table a bien created_at et updated_at
    public $timestamps = true;
    
    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
    public static function create_eleve($id, $nom, $prenom, $classe, $genre, $statut, $id_college, $id_equipe, $com){
        DB::insert('insert into mcd_utilisateurs (id, nom, prenom, classe, commentaire, code_statut, code_genre, id_college, id_equipe) 
        values (:id, :nom, :prenom, :classe, :com, :code_statut,:code_genre, :id_college, :id_equipe)',
        ['id'=>$id,'nom'=>$nom,'prenom'=>$prenom, 'classe'=>$classe , 'com'=>$com,'code_statut'=>$statut,'code_genre'=> $genre ,'id_college'=>$id_college, 'id_equipe'=>$id_equipe]);
    }

    public static function modif_eleve($id, $nom, $prenom, $genre, $email, $classe) 
{
    return DB::update(
        'UPDATE utilisateurs 
         SET nom = :nom, 
             prenom = :prenom, 
             code_genre = :genre, 
             classe = :classe, 
             commentaire = :commentaire
         WHERE id = :id',
        [
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'classe' => $classe,
            'commentaire' => $email
        ]
    );
}

}
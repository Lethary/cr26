<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    // ✅ Spécifier le nom correct de la table
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public static function create_eleve($nom, $email, $password)
{
    $id = DB::table('users')->insertGetId([
        'name' => $nom,
        'email' => $email,
        'password' => $password,
    ]);

    return $id;
}


   public static function delete_eleve($id)
{
    // Supprime d'abord les dépendances dans "engager"
    DB::table('engager')->where('id_utilisateur', $id)->delete();

    // Supprime l'utilisateur lié dans "utilisateurs"
    DB::table('utilisateurs')->where('id', $id)->delete();

    // Supprime l'utilisateur principal
    DB::table('users')->where('id', $id)->delete();
}

 
     public static function modif_eleve($id, $nom, $prenom, $email)
{
    return DB::update(
        'UPDATE users 
         SET name = :name, email = :email 
         WHERE id = :id',
        [
            'id' => $id,
            'name' => $nom . ' ' . $prenom,
            'email' => $email
        ]
    );
}
}
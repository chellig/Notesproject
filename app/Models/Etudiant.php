<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_etudiant';
    protected $fillable = [      
        'nom',
        'prenom',
        'cin',
        'groupe',
        'adresse',
        'email',
        'télephone',
       
    ];
    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'id_etudiant');
    }
    // Modèle Etudiant
public function notes()
{
    return $this->hasMany(Note::class, 'id_etudiant');
}
}

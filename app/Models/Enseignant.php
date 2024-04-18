<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_enseignant';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'adresse',
        'télephone',
    ];
    public function matieres()
{
    return $this->hasMany(Matiere::class, 'id_enseignant');
}
// Modèle Enseignant
public function notes()
{
    return $this->hasMany(Note::class, 'id_enseignant');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_note';

    protected $fillable = [
        'valeur',
        'date_note',
        'id_enseignant', 
        'id_etudiant', 
        'id_matiere',     
    ];
    // Relation avec l'étudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }

    // Relation avec l'enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }

    // Relation avec la matière
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'id_matiere');
    }
}

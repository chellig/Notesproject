<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_matiere';

    protected $guarded = [  
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }

    public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'id_etudiant');
}

    public function notes()
     {
    return $this->hasMany(Note::class, 'id_matiere');
     }
}

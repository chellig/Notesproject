<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant', 'enseignant', 'matiere'])->get();
      
        return $notes;
    }

    public function store(Request $request)
    {      
        $note = new Note([
            'valeur' => $request->input('valeur'),
            'date_note' => $request->input('date_note'),
            'id_enseignant' => $request->input('id_enseignant'),
            'id_etudiant' => $request->input('id_etudiant'),            
            'id_matiere' => $request->input('id_matiere'),
        ]);      
        $note->save();
        return response()->json($note, 201);
    }

    public function show($id_note)
    {
        $note = Note::find($id_note);
        return response()->json($note);
    }

    public function update(Request $request, $id_note)
    {       
        $note = Note::find($id_note);  
        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function destroy($id_note)
    {
        $note = Note::find($id_note);
        $note->delete();
        return response()->json('Note supprimée avec succès !');
    }
}

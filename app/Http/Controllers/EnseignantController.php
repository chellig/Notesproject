<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::all();
        return $enseignants;
    }

    public function store(Request $request)
    {      
        $enseignant = Enseignant::make([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'adresse' => $request->input('adresse'),
            'télephone' => $request->input('télephone')
        ]);      
        $enseignant->save();
        return response()->json($enseignant, 201);
    }

    public function show($id_enseignant)
    {
        $enseignant = Enseignant::find($id_enseignant);
        return response()->json($enseignant);
    }

    public function update(Request $request, $id_enseignant)
    {       
        $enseignant = Enseignant::find($id_enseignant);  
        $enseignant->update($request->all());

        return response()->json($enseignant, 200);
    }

    public function destroy($id_enseignant)
    {
        try {
            $enseignant = Enseignant::findOrFail($id_enseignant);
            $enseignant->delete();
            return response()->json('Enseignant supprimé avec succès !');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

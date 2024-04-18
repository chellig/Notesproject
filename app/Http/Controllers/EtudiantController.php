<?php
namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return $etudiants;
    }
    
    public function store(Request $request)
    {      
        $etudiant = Etudiant::make( [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'cin'=> $request->input('cin'),
            'groupe' => $request->input('groupe'),
            'adresse' => $request->input('adresse'),
            'email'=> $request->input('email'),
            'télephone'=> $request->input('télephone')
            
        ]);      
        $etudiant->save();
        return response()->json($etudiant,201);
    }
    /***show *****/
    public function show($id_etudiant)
    {
        $etudiant = Etudiant::find($id_etudiant);
        return response()->json( $etudiant);
    }
    /****update**** */
    public function update(Request $request, $id_etudiant)
    {       
        $etudiant = Etudiant::find($id_etudiant);  
        $etudiant->update($request->all());
        return response()->json($etudiant, 200);
    }
    public function destroy($id_etudiant)
    {
        $etudiant = Etudiant::find($id_etudiant);
        $etudiant->delete();
        return response()->json('Étudiant supprimé avec succès !');
    }
    public function search(Request $request)
{
    $searchTerm = $request->input('searchTerm');

    $etudiants = Etudiant::where('nom', 'like', '%' . $searchTerm . '%')->get();

    return response()->json($etudiants);
}

}

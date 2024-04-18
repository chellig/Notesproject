<?php
namespace App\Http\Controllers;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MatiereController extends Controller
{
    public function index()
{
    $matieres = Matiere::with(['enseignant', 'etudiant'])->get();
  
    return $matieres->map(function ($matiere) {
        return [
            'id_matiere' => $matiere->id_matiere,
            'nom' => $matiere->nom,
            'code_matiere' => $matiere->code_matiere,
            'enseignant' => $matiere->enseignant ? $matiere->enseignant->only(['id_enseignant', 'nom', 'prenom']) : null,
            'etudiant' => $matiere->etudiant ? $matiere->etudiant->only(['id_etudiant', 'nom', 'prenom']) : null,
        ];
    });
}
    public function store(Request $request)
    {      
        $matiere = new Matiere([
            'nom' => $request->input('nom'),
            'code_matiere' => $request->input('code_matiere'),
            'id_enseignant' => $request->input('id_enseignant'),
            'id_etudiant' => $request->input('id_etudiant'),
        ]);      
        $matiere->save();
        return response()->json($matiere, 201);
    }

     /***show *****/
     public function show($id_matiere)
     {
         $matiere = Matiere::find($id_matiere);
         return response()->json( $matiere);
     }
    // ... autres méthodes
      /****update**** */
      public function update(Request $request, $id_matiere)
      {       
          $matiere = Matiere::find($id_matiere);  
          $matiere->update($request->all());
  
          return response()->json($matiere, 200);
      }
      public function destroy($id_matiere)
      {
          $matiere = Matiere::find($id_matiere);
          $matiere->delete();
          return response()->json('Matiere supprimé avec succès !');
      }

    function showMatiereByEnseig($id_enseignant)
    {
        $matieres = Matiere::where('id_enseignant', $id_enseignant)->with('enseignant')->get();
        return response()->json($matieres);
    }

    public function showMatiereByEtud($id_etudiant)
    {
        $matieres = Matiere::where('id_etudiant', $id_etudiant)->with('etudiant')->get();
        return response()->json($matieres);
    }
}

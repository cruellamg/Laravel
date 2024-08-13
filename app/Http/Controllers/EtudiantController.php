<?php

namespace App\Http\Controllers;

use App\Models\EtudiantModel;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = EtudiantModel::all(); //sélectionne moi toutes les colonnes dans la table etudiants. en PHP : SELECT * FROM etudiants;
        return view('renseignement', compact('etudiants')); //compact est là pour lier la variable à la vue. ici la variable est etudiants
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = new EtudiantModel();
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->age = $request->input('age');
        $etudiant->classe = $request->input('classe');
        $etudiant->save(); //sauvegarder ce qui sera inscrit dans les différents champs

        return redirect('/etudiant_page')->with('alert1', "L'étudiant a été ajouter avec succès");

        
        
    }

    public function delete_etudiant($id){
        $etudiant = EtudiantModel::find($id);
        $etudiant->delete();
        return redirect('/etudiant_page')->with('alert1', "L'étudiant a bien été supprimé");
    }



   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant = EtudiantModel::findOrFail($id);//SELECT*FROM etudiant where id = $id

        return view('update', compact('etudiant'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'classe' => 'required',
        ]);
        
        

        $etudiant = EtudiantModel::findOrFail($id);
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->age = $request->input('age');
        $etudiant->classe = $request->input('classe');
        $etudiant->update();

        return redirect('/etudiant_page')->with('alert1', "L'étudiant a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;


class ReclamationController extends Controller
{


   


    // Afficher le formulaire de création de réclamation
    public function create()
    {
        return view('reclamationscreate');
    }


    // Enregistrer une nouvelle réclamation
    public function store(Request $request)
    {
        $reclamation = new Reclamation;
        $reclamation->description = $request->input('description');
        $reclamation->user_id = Auth::user()->id; 
        $reclamation->save();

        return redirect()->route('reclamationsindex');
    }


    //afficher les reclamations de user connecte 

    public function listReclamations()
    {
        $reclamations = auth()->user()->reclamations;
    
        return view('reclamationsindex', compact('reclamations'));
    }
    
    //supprimer une reclamation
    public function destroy($id)
{
    $reclamation = Reclamation::findOrFail($id);
    $reclamation->delete();
    return redirect()->route('reclamationsindex')->with('success', 'Réclamation supprimée avec succès.');
}


//update reclamation

public function edit($id)
{
    $reclamation = Reclamation::find($id);
    return view('reclamationsedit', compact('reclamation'));
}

public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $this->validate($request, [
        'description' => 'required',
    ]);

    // Mettre à jour la réclamation
    $reclamation = Reclamation::find($id);
    $reclamation->description = $request->input('description');
    // Mettre à jour d'autres champs au besoin

    $reclamation->save();

    return redirect()->route('reclamationsindex')->with('success', 'Réclamation mise à jour avec succès.');
}






}



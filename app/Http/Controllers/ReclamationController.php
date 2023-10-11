<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;

class ReclamationController extends Controller
{
    // Afficher la liste des réclamations
    public function index()
    {
        $reclamations = Reclamation::all();
        return view('reclamations.index', compact('reclamations'));
    }

    // Afficher le formulaire de création de réclamation
    public function create()
    {
        return view('reclamations.create');
    }

    // Enregistrer une nouvelle réclamation
    public function store(Request $request)
    {
        $reclamation = new Reclamation;
        $reclamation->description = $request->input('description');
        $reclamation->user_id = Auth::user()->id; // Associez la réclamation à l'utilisateur connecté
        $reclamation->save();

        return redirect()->route('reclamations.index');
    }

    // Afficher une réclamation spécifique avec ses réponses
    public function show($id)
    {
        $reclamation = Reclamation::with('reponses')->find($id);
        return view('reclamations.show', compact('reclamation'));
    }

    // Afficher le formulaire d'édition de réclamation
    public function edit($id)
    {
        $reclamation = Reclamation::find($id);
        return view('reclamations.edit', compact('reclamation'));
    }

    // Mettre à jour une réclamation
    public function update(Request $request, $id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->description = $request->input('description');
        $reclamation->save();

        return redirect()->route('reclamations.index');
    }

    // Supprimer une réclamation
    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();

        return redirect()->route('reclamations.index');
    }
}



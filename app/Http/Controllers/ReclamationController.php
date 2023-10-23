<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;
use App\Models\Reponse;
use App\Mail\ReclamationResponse;
use Illuminate\Support\Facades\Mail;

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
    // Définissez les règles de validation pour les champs du formulaire
    $rules = [
        'description' => 'required|min:5', // champ description requis et doit avoir au moins 5 caractères
    ];

    // Définissez les messages d'erreur personnalisés (optionnel)
    $messages = [
        'description.required' => 'Le champ description est requis.',
        'description.min' => 'Le champ description doit avoir au moins :5 caractères.',
    ];

    // Validez les données du formulaire en utilisant les règles définies
    $request->validate($rules, $messages);

    // Si la validation réussit, créez et enregistrez la réclamation
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

        $reclamation->reponses()->delete();

        $reclamation->delete();

        return redirect()->route('reclamationsindex')->with('success', 'Réclamation et ses réponses associées ont été supprimées avec succès.');
    }



//update reclamation

        public function edit($id)
    {
        $reclamation = Reclamation::find($id);
        return view('reclamationsedit', compact('reclamation'));
    }

// Mettre à jour la réclamation

        public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $reclamation = Reclamation::find($id);
        $reclamation->description = $request->input('description');
        $reclamation->save();

        return redirect()->route('reclamationsindex')->with('success', 'Réclamation mise à jour avec succès.');
    }


//partie admin 

//afficher les reclamations 

        public function toutelistReclamations()
    {
        if (auth()->check() && auth()->user()->email === 'admin@email.com') {
            $reclamations = Reclamation::all();
            return view('reclamationsindexall', compact('reclamations'));
        } else {
            abort(403, 'Access denied');
        }
    }
//supprimer une reclamation
public function Adestroy($id)
{
    $reclamation = Reclamation::findOrFail($id);
    $reclamation->reponses()->delete();
    $reclamation->delete();

    return redirect()->route('reclamationsindexall')->with('success', 'Réclamation supprimée avec succès.');
}



// vue create responce

        public function createR($Reclamationid)
    {
        $reclamation = Reclamation::find($Reclamationid);
    
        return view('responsescreate', compact('reclamation'));
    }

//enregistrer reponse


public function storeR(Request $request, $reclamationId)
{
    $request->validate([
        'content' => 'required|min:5', // Exemple : champ content requis et doit avoir au moins 5 caractères
    ]);
    
    $reclamation = Reclamation::find($reclamationId);
    $reponse = new Reponse();
    $reponse->content = $request->input('content');
    $reponse->reclamation_id = $reclamationId;

    $reponse->save();
    
    $url = "http://127.0.0.1:8000/reclamations";
    Mail::to($reclamation->user->email)->send(new ReclamationResponse($reclamation, $reponse, $url));

    return redirect()->route('reclamationsindexall')
        ->with('success', 'Réponse enregistrée avec succès');
}


//supp response

        public function destroyR($idReponse)
    {
        $reponse = Reponse::findOrFail($idReponse);
        $reponse->delete();

        return redirect()->back()->with('success', 'Réponse supprimée avec succès.');
    }


//vue update 
        public function editR($Reclamationid, $id)
    {
        $reclamation = Reclamation::findOrFail($Reclamationid);
        $reponse = $reclamation->reponses()->findOrFail($id);

        return view('reponsesedit', compact('reclamation', 'reponse'));
    }

//update 

        public function updateR(Request $request, $Reclamationid, $id)
    {
        $reclamation = Reclamation::findOrFail($Reclamationid);
        $reponse = $reclamation->reponses()->findOrFail($id);

        $request->validate([
            'content' => 'required',
        ]);

        $reponse->content = $request->input('content');
        $reponse->save();

        return redirect()->route('reclamationsindexall')->with('success', 'Réponse mise à jour avec succès.');
    }







}



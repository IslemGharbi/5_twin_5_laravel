<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;
use App\Models\Reponse;


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
        $reclamations = Reclamation::all();
        
        return view('reclamationsindexall', compact('reclamations'));
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


        public function storeR(Request $request, $Reclamationid)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $reponse = new Reponse();
        $reponse->content = $request->input('content');
        $reponse->reclamation_id = $Reclamationid; 

        $reponse->save();

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



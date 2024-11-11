<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\serveur;

class serveurController extends Controller
{
    public function liste_serveur()
    {
        $serveurs = serveur::all();
        return view('serveurs.listeserveurs', compact('serveurs'));
    }
    public function ajouter_serveur()
    {
        return view('serveurs.ajouterserveur');
    }
    public function ajouter_serveur_traitement(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'nom' => 'required',
            'adresse' => 'required',

        ]);
        $serveur = new serveur();
        // $category->id = $request->id;
        $serveur->nom = $request->nom;
        $serveur->adresse = $request->adresse;
        $serveur->save();
        return redirect('serveur')->with('status', 'La categorie a bien été ajouter avec succes.');
    }
    public function supprimer_serveur_traitement(Request $request)
    {
        // Trouver le serveur à supprimer dans la base de données
        serveur::findOrfail($request->id)->delete();
        return redirect('/serveur');
    }
    public function modifier_serveur($id){
        $serveur = serveur::findOrFail($id);
        return view("serveurs.modifierserveur")->with('serveur', $serveur);
    }
    public function modifier_serveur_traitement(Request $request){
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);
    
        // Récupération du serveur à modifier
        $serveur = serveur::find($request->id);
        if (!$serveur) {
            // Redirection en cas de serveur non trouvé
            return redirect()->back()->with('error', 'Serveur non trouvé.');
        }
    
        // Mise à jour des champs du serveur
        $serveur->nom = $request->nom;
        $serveur->adresse = $request->adresse;
        $serveur->save();
    
        // Redirection avec un message de succès
        return redirect('/serveur')->with('success', 'Serveur mis à jour avec succès.');
    }
        













    // public function modifier_serveur($id){
    //     $serveur=serveur::findOrfail($id);
    //     return view("serveurs.modifierserveur")->with('serveur', $serveur);
    // }
    // public function modifier_serveur_traitement(Request $request){
    //     $serveur = serveur::find($request->id);
    //     $serveur->nom = $request->nom;
    //     $serveur->adresse = $request->adresse;
    //     $serveur->save();
    //     return redirect('/serveur');
    // }   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table; // Supposant que 'table' est votre classe de modèle pour les tables dans votre base de données.

class RapportController extends Controller
{
    // Méthode pour afficher le rapport
    public function Afficher(Request $request){
        // Récupérer la date à partir des paramètres de la requête
        $date = $request->input("date");

        // Récupérer les données des tables de la session
        $tables = $request->session()->get('tables'); // Récupérer les données des tables depuis la session
        $somme = $request->session()->get('somme'); // Récupérer la somme depuis la session

        // Retourner votre vue avec les données
        return view('Rapports.afficher', ["date" => $date, "data" => $tables, "somme" => $somme]); // Rendre la vue 'Rapports.afficher' avec la date, les données des tables et la somme
    }

    // Méthode pour gérer la soumission du formulaire pour obtenir des données pour une date spécifique
    public function getDate(Request $request){
        // Valider la requête entrante
        $request->validate([
            "dateF" => "required" // Champ de date requis
        ], [
            "dateF.required" => "Vous devez donner une date !!" // Message d'erreur si le champ de date est vide
        ]);

        // Récupérer les données des tables et la somme pour la date spécifiée
        $tables = table::whereDate('created_at', '<=', $request->input("dateF"))->get(); // Récupérer les données des tables pour la date spécifiée
        $somme = table::whereDate('created_at', '<=', $request->input("dateF"))->sum('price'); // Récupérer la somme des prix pour la date spécifiée

        // Rediriger vers la méthode 'Afficher' avec la date spécifiée en tant que paramètre de requête et transmettre les données des tables et la somme en utilisant la session
        return redirect("/afficher?dateF=" . $request->input("dateF"))->with(['tables' => $tables, 'somme' => $somme]);
    }
}

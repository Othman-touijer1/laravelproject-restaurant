<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table;

class TableController extends Controller
{
    public function liste_table()
    {
        $tables = table::all();
        return view('tables.listetable', compact('tables'));
    }
    public function reservation()
    {
        return view('Reservation.rserver');
    }
    public function reserver_table_traitement(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'serverName' => 'required',
            'serverEmail' => 'required',
            'numTable' => 'required',
            'prix' => 'required',
        ]);
       
        $table = new table();
        $table->user_name = $request->serverName;
        $table->email = $request->serverEmail;
        $table->num= $request->numTable;
        $table->price = $request->prix;
        $table->save();
        return redirect('/reserver')->with('status', 'La categorie a bien été ajouter avec succes.');
    }
    public function supprimer_table_traitement(Request $request)
    {
        table::findOrfail($request->id)->delete();
        return redirect('/table');
    }
    public function modifier_table($id){
        $table = Table::findOrFail($id);
        return view("tables.modifiertable")->with('table', $table);
    }
    public function modifier_table_traitement(Request $request)
{
    // Validation des données
    $request->validate([
        'serverName' => 'required|string|max:255',
        'serverEmail' => 'required|email|max:255',
        'numTable' => 'required|integer|min:1',
        'prix' => 'required|numeric|min:0',
    ]);

    // Récupération de la table à modifier
    $table = Table::find($request->id);
    if (!$table) {
        // Redirection en cas de table non trouvée
        return redirect()->back()->with('error', 'Table non trouvée.');
    }

    // Mise à jour des champs de la table
    $table->user_name = $request->serverName;
    $table->email = $request->serverEmail;
    $table->num = $request->numTable;
    $table->price = $request->prix;
    $table->save();

    // Redirection avec un message de succès
    return redirect('/table')->with('success', 'Table mise à jour avec succès.');
}
    






    // public function modifier_table($id){
    //     $table=table::findOrfail($id);
    //     return view("tables.modifiertable")->with('table', $table);}
    // public function modifier_table_traitement(Request $request)
    //     {
    //         $table = table::find($request->id);
    //         $table->user_name = $request->serverName;
    //         $table->email = $request->serverEmail;
    //         $table->num = $request->numTable;
    //         $table->price = $request->prix;
    //         $table->save();
    //         return redirect('/table');
    //     }
    }

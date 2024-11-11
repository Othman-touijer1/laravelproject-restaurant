<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function liste_menu()
    {
        $menus = Menu::all();
        return view('produits.listemenu', compact('menus'));
    }

    public function ajouter_menu()
    {
        return view('produits.ajoutermenu');
    }

    public function ajouter_menu_traitement(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'category' => 'required',
            'prix' => 'required',
            'image' =>'required|image|max:2048' ,
        ]);
        

        $menu = new Menu();
        $menu->titre = $request->input('titre');
        $menu->category = $request->input('category');
        $menu->prix = $request->input('prix');
        if($request->hasFile("image")){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move("uploads/images", $filename);
            $menu->image = $filename;
        }
        $menu->save();
        return redirect()->route('menu')->with('success', 'Menu ajouté avec succès');
    }
    public function supprimer_menu_traitement(Request $request)
    {
        Menu::findOrfail($request->id)->delete();
        return redirect('/menu');
    } 
    public function modifier_menu($id){
        $menu = Menu::findOrFail($id);
        return view("produits.modifiermenu")->with('menu', $menu);
    }
    public function modifier_menu_traitement(Request $request)
{
    // Validation des données
    $request->validate([
        'titre' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
    ]);

    // Récupération du menu à modifier
    $menu = Menu::find($request->id);
    if (!$menu) {
        // Redirection en cas de menu non trouvé
        return redirect()->back()->with('error', 'Menu non trouvé.');
    }

    // Mise à jour des champs du menu
    $menu->titre = $request->titre;
    $menu->category = $request->category;
    $menu->prix = $request->prix;
    $menu->save();

    // Redirection avec un message de succès
    return redirect('/menu')->with('success', 'Menu mis à jour avec succès.');
}
    













    // public function modifier_menu($id){
    //     $menu= Menu::findOrfail($id);
    //     return view("produits.modifiermenu")->with('menu', $menu);
    // }
    // public function modifier_menu_traitement(Request $request)
    // {
    //     $menu = Menu::find($request->id);
    //     $menu->titre = $request->titre;
    //     $menu->category = $request->category;
    //     $menu->prix = $request->prix;
    //     $menu->save();
    //     return redirect('/menu');
    // }
}



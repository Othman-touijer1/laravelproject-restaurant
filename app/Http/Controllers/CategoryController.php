<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function liste_category()
    {
        $categories = category::all();
        return view('category.liste', compact('categories'));
    }
    //ajouter
    public function ajouter_category(){
        return view('category.ajouter');
    }
    public function ajouter_category_traitement(Request $request)
    {
        $request->validate([
            'titre' => 'required',
        ]);
        $category = new Category();
        $category->titre = $request->titre;
        $category->save();
        return redirect('/ajouter')->with('status', 'La categorie a bien été ajouter avec succes.');
    }
    //supprimer
    public function supprimer_category_traitement(Request $request)
    {
        category::findOrfail($request->id)->delete();
        return redirect('/category');
    }
    //modifier
    public function modifier_category(Request $request, $id){
        $categorieId =category::findOrfail($id);
        return view("category.modifier", ["id" => $categorieId]);
    }

    public function modifier_category_traitement(Request $request, $id){
        try{
            $category = category::where("id", $id)->first();
            
            if(!$category){
                return redirect("/category");
            }

            $category->titre = $request->titre;
            $category->save();
            return redirect('/category');
        }catch(\Exception $error){
            return $error;
        }
    }
}
 
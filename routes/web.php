<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RapportController;
use App\Http\Middleware\authMiddleware;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\testAdmin;


Route::get('/ajouter', [CategoryController::class, 'ajouter_category']);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/regle', function () {
    return view('regles');
});

// category
Route::post('/ajouter/traitement', [CategoryController::class, 'ajouter_category_traitement']);
Route::get("/modifiercategory/{id}", [CategoryController::class, 'modifier_category']);
Route::patch('/modifiercategorie/traitement/{id}', [CategoryController::class, 'modifier_category_traitement']);
Route::get('/supprimercategorie/{id}', [CategoryController::class, 'supprimer_category_traitement']);

// menu
Route::get('/ajoutermenu', [MenuController::class, 'ajouter_menu']);
Route::post('/ajoutermenu/traitement', [MenuController::class, 'ajouter_menu_traitement']);
Route::get('/supprimermenu/{id}', [MenuController::class, 'supprimer_menu_traitement']);
Route::get('/modifiermenu/{id}', [MenuController::class, 'modifier_menu']);
Route::post('/modifiermenu/traitement/{id}', [MenuController::class,'modifier_menu_traitement']);

// serveur
Route::get('/ajouterserveur', [ServeurController::class, 'ajouter_serveur']);
Route::post('/ajouterserveur', [ServeurController::class, 'ajouter_serveur']);
Route::post('/ajouterserveur/traitement', [ServeurController::class, 'ajouter_serveur_traitement']);
Route::get('/modifierserveur/{id}', [ServeurController::class, 'modifier_serveur']);
Route::post('/modifierserveur/traitement/{id}', [ServeurController::class,'modifier_serveur_traitement']);
Route::get('/supprimerserveur/{id}', [ServeurController::class, 'supprimer_serveur_traitement']);

// Route::patch('/modifiercategorie/traitement/{id}', [CategoryController::class, 'modifier_category_traitement']);
// Route::get('/reserver', [TableController::class, 'reservation']);

Route::get('/reserver', [TableController::class, 'reservation']);

Route::middleware([authMiddleware::class])->group(function () {
    Route::get('/reserver', [TableController::class, 'reservation']);
});

Route::middleware([adminMiddleware::class])->group(function () {
    Route::get('/table', [TableController::class, 'liste_table']);
    Route::get('/serveur', [ServeurController::class, 'liste_serveur']);
    Route::get('/menu', [MenuController::class, 'liste_menu'])->name('menu');
    Route::get('/category', [CategoryController::class, 'liste_category']);
    Route::get('/afficher',[RapportController::class, 'Afficher']);
});

// table
Route::post('/reserver/traitement', [TableController::class, 'reserver_table_traitement']);
Route::get('/modifiertable/{id}', [TableController::class, 'modifier_table'])->name('modifiertable');
Route::post('/modifier/traitement/{id}', [TableController::class, 'modifier_table_traitement']);
Route::get('/supprimertable/{id}', [TableController::class, 'supprimer_table_traitement']);



//Rapport
Route::get("/getDate", [RapportController::class, 'getDate']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
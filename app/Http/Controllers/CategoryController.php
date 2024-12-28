<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Méthode pour afficher le formulaire
    public function create()
    {
        return view('categories.create');
    }

    // Méthode pour enregistrer la catégorie dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Créer et sauvegarder la catégorie
        Category::create([
            'name' => $request->input('name'),
        ]);

        // Rediriger vers la page de création avec un message de succès
        return redirect()->route('categories.create')->with('success', 'Catégorie ajoutée avec succès!');
    }



    public function index()
    {
        try {
            // Récupérer les catégories avec leurs sous-catégories
            $categories = Category::with('subcategories')->get();
    
            // Retourner la vue avec les catégories
            return view('categories.index', compact('categories'));
        } catch (\Exception $e) {
            // Affiche un message d'erreur en cas de problème
            return redirect()->back()->with('error', 'Erreur lors de la récupération des catégories.');
        }
    }
    




    // Méthode pour supprimer une catégorie
public function destroy($id)
{
    // Trouver la catégorie par son ID
    $category = Category::findOrFail($id);

    // Supprimer la catégorie
    $category->delete();

    // Rediriger avec un message de succès
    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
}




// Relation avec les sous-catégories
public function subcategories()
{
    return $this->hasMany(Subcategory::class);
}




public function showSubcategories($id)
{
    // Trouver la catégorie par son ID
    $category = Category::with('subcategories')->findOrFail($id);

    // Retourner la vue avec la catégorie et ses sous-catégories
    return view('categories.subcategories', compact('category'));
}


}
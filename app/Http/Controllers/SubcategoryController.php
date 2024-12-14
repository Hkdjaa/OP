<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    // Affiche le formulaire pour créer une sous-catégorie
    public function create()
    {
        // Récupère toutes les catégories existantes
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    // Enregistre la sous-catégorie dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Créer et sauvegarder la sous-catégorie
        Subcategory::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('subcategories.create')->with('success', 'Sous-catégorie ajoutée avec succès!');
    }
}

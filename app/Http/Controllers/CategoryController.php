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
}

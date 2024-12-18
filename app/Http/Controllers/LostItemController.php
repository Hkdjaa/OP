<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItem;
use App\Models\Category;
use App\Models\Subcategory;

class LostItemController extends Controller
{
    // Affiche le formulaire de déclaration
    public function create()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('lost-items.create', compact('categories'));
    }

    // Enregistre une déclaration dans la base de données
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'date_lost' => 'required|date',
            'place' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'phone_number' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Gestion du fichier photo (si fourni)
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('lost_items_photos', 'public');
        }

        // Associe l'utilisateur connecté
        $validated['user_id'] = auth()->id();

        // Crée l'objet perdu dans la base de données
        LostItem::create($validated);

        // Redirige avec un message de succès
        return redirect()->route('lost-items.create')->with('success', 'Déclaration enregistrée avec succès.');
    }
}

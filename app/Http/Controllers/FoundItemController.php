<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoundItem;
use App\Models\Category;
use App\Models\Subcategory;

class FoundItemController extends Controller
{
    // Affiche le formulaire de déclaration
    public function create()
    {
        $categories = Category::all();
        return view('found-items.create', compact('categories'));
    }

    // Enregistre un objet trouvé dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'date_found' => 'required|date',
            'place' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'phone_number' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('found_items_photos', 'public');
        }

        $validated['user_id'] = auth()->id();

        FoundItem::create($validated);

        // Vérifie si l'utilisateur est admin
        if (auth()->user()->is_admin) {
            return redirect()->route('found-items.createAdmin')->with('success', 'Déclaration ajoutée avec succès!');
        }

        return redirect()->route('found-items.create')->with('success', 'Déclaration enregistrée avec succès.');
    }

    // Affiche tous les objets trouvés pour la partie admin
    public function index()
    {
        $foundItems = FoundItem::with(['category', 'subcategory'])->get();
        return view('found-items.index', compact('foundItems'));
    }

    // Affiche tous les objets trouvés pour la partie vitrine
    public function liste()
{
    $objets = FoundItem::all(); // Récupère tous les objets trouvés
    return view('found-items.liste', compact('objets')); // Charge la vue dédiée à la vitrine
}


    // Page de création pour l'interface admin
    public function createAdmin()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('found-items.createAdmin', compact('categories'));

    }

    // Modifier un objet trouvé
    public function edit($id)
    {
        $foundItem = FoundItem::findOrFail($id);
        $categories = Category::all();
        return view('found-items.edit', compact('foundItem', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'date_found' => 'required|date',
            'place' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'phone_number' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foundItem = FoundItem::findOrFail($id);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('found_items_photos', 'public');
        }

        $foundItem->update($validated);

        return redirect()->route('found-items.index')->with('success', 'Objet trouvé mis à jour avec succès.');
    }

    // Supprimer un objet trouvé
    public function destroy($id)
    {
        $foundItem = FoundItem::findOrFail($id);
        $foundItem->delete();

        return redirect()->route('found-items.index')->with('success', 'Objet trouvé supprimé avec succès.');
    }
}

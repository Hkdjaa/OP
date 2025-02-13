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

        // Vérifie si l'utilisateur est admin
        if (auth()->user()->is_admin) {
            return redirect()->route('lost-items.createAdmin')->with('success', 'Déclaration ajoutée avec succès!');
        }

        return redirect()->route('lost-items.create')->with('success', 'Déclaration enregistrée avec succès.');
    }


    // Affichage pour la page admin (lost-items.index)
    public function index()
    {
        $lostItems = LostItem::all();  // Affiche tous les objets perdus pour l'admin
        return view('lost-items.index', compact('lostItems'));
    }

    // Affichage pour la page d'accueil (welcome.blade.php)
    public function showByCategory()
    {
        // Récupère tous les objets perdus avec leurs catégories et sous-catégories
        $lostItems = LostItem::with('category', 'subcategory')->get();

        // Organiser les objets par catégorie
        $itemsByCategory = [];

        foreach ($lostItems as $item) {
            // Ajouter les objets à leur catégorie respective
            $itemsByCategory[$item->category->name][] = $item;
        }
        // Passer les objets organisés à la vue
        return view('welcome', compact('itemsByCategory'));
    }
    
    // Page de création pour l'interface admin
    public function createAdmin()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('lost-items.createAdmin', compact('categories'));

    }

    //MODIFIER UN OBJET PERDU
    public function edit($id)
{
    $lostItem = LostItem::findOrFail($id);
    $categories = Category::all();
    return view('lost-items.edit', compact('lostItem', 'categories'));
}

public function update(Request $request, $id)
{
    // Valider les données
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

    // Récupérer l'objet à modifier
    $lostItem = LostItem::findOrFail($id);

    // Gestion du fichier photo (si modifié)
    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('lost_items_photos', 'public');
    }

    // Mettre à jour les données
    $lostItem->update($validated);

    // Rediriger avec un message de succès
    return redirect()->route('lost-items.index')->with('success', 'Objet perdu mis à jour avec succès.');
}


//SUPPRIMER UN OBJET PERDU
public function destroy($id)
{
    $lostItem = LostItem::findOrFail($id); // Trouve l'objet perdu ou échoue
    $lostItem->delete(); // Supprime l'objet perdu

    // Redirige avec un message de succès
    return redirect()->route('lost-items.index')->with('success', 'Objet perdu supprimé avec succès.');
}
public function show($id)
{
    // Récupère l'objet perdu par son ID
    $lostItem = LostItem::with('category', 'subcategory', 'user')->findOrFail($id);

    return view('lost-items.show', compact('lostItem'));
}
}
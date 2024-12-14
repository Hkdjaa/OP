<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\LostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    // Affiche le formulaire pour déclarer un objet perdu
    public function create()
    {
        // Récupère toutes les catégories
        $categories = Category::all();
        return view('lost-items.create', compact('categories'));
    }

    // Enregistre l'objet perdu dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'date_lost' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'phone_number' => 'required|string|max:15',
        ]);

        // Crée et sauvegarde l'objet perdu
        LostItem::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date_lost' => $request->input('date_lost'),
            'location' => $request->input('location'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'phone_number' => $request->input('phone_number'),
        ]);

        // Redirige avec un message de succès
        return redirect()->route('lost-items.create')->with('success', 'Objet perdu déclaré avec succès!');
    }
}

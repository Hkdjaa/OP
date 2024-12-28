<?php

namespace App\Http\Controllers;

use App\Models\ObjetTrouve;
use App\Models\Category;
use Illuminate\Http\Request;

class ObjetTrouveController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('objets_trouves.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_objet' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'lieu_trouve' => 'required|string|max:255',
            'date_trouvee' => 'required|date',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour les images
        ]);
    
        // Gestion du fichier photo
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/objets_trouves'), $fileName);
            $validated['photo'] = $fileName;
        }
    
        $objetTrouve = ObjetTrouve::create($validated);
    
        if ($request->input('action') === 'save_and_show') {
            return redirect()->route('objets_trouves.similar', ['categorie_id' => $objetTrouve->categorie_id]);
        }
    
        return redirect()->route('objets_trouves.create')->with('success', 'Objet trouvé ajouté avec succès.');
    }
    

public function similar($categorie_id)
{
    $objets = ObjetTrouve::where('categorie_id', $categorie_id)->get();

    return view('objets_trouves.similaire', compact('objets'));
}

       
}

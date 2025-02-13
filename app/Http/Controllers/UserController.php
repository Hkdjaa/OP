<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Récupère tous les utilisateurs
        $users = User::all();

        // Retourne la vue avec les utilisateurs
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        // Vérifie si l'utilisateur connecté est un admin
        if (!auth()->user()->is_admin) {
            abort(403, 'Accès interdit');
        }

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function destroy($id)
    {
        // Vérifie si l'utilisateur connecté est un admin
        if (!auth()->user()->is_admin) {
            abort(403, 'Accès interdit');
        }

        $user = User::findOrFail($id);
        $user->delete(); // Soft delete grâce au trait SoftDeletes

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }


    public function update(Request $request, $id)
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    // Valider les données du formulaire
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'is_admin' => 'required|boolean',
    ]);

    // Récupère l'utilisateur et met à jour ses données
    $user = User::findOrFail($id);
    $user->update($validated);

    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}


public function create()
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    return view('users.create');
}

public function store(Request $request)
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    // Valide les données du formulaire
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'is_admin' => 'required|boolean',
    ]);

    // Crée le nouvel utilisateur avec le champ 'created_by'
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'is_admin' => $validated['is_admin'],
        'created_by' => auth()->id(), // ID de l'admin qui crée l'utilisateur
    ]);
    

    return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
}

public function show($id)
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    // Récupère les détails de l'utilisateur
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
}





public function showDeletedUsers()
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    // Récupère les utilisateurs dont deleted_at est non nul
    $deletedUsers = User::whereNotNull('deleted_at')->get();

    // Retourne la vue avec les utilisateurs supprimés
    return view('users.deleted', compact('deletedUsers'));
}


// Dans UserController.php

public function restore($id)
{
    // Vérifie si l'utilisateur connecté est un admin
    if (!auth()->user()->is_admin) {
        abort(403, 'Accès interdit');
    }

    // Récupère l'utilisateur supprimé
    $user = User::withTrashed()->findOrFail($id);

    // Restaure l'utilisateur
    $user->restore();

    return redirect()->route('users.deleted')->with('success', 'Utilisateur restauré avec succès.');
}


public function deleted()
    {
        // Récupère les utilisateurs avec deleted_at non nul (soft deleted)
        $deletedUsers = User::onlyTrashed()->get(); // Utilise onlyTrashed pour obtenir les utilisateurs supprimés

        // Retourne la vue avec les utilisateurs supprimés
        return view('users.deleted', compact('deletedUsers'));
    }


public function redirectAfterLogin()
{
    if (auth()->check()) {
        if (auth()->user()->is_admin) {
            return redirect()->route('dashboard'); // Redirige vers le tableau de bord
        } else {
            return redirect('/'); // Redirige vers la page d'accueil
        }
    }
    return redirect()->route('login'); // Si l'utilisateur n'est pas connecté, il est renvoyé vers la page de connexion
}
}
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    ProfileController,
    CategoryController,
    SubcategoryController,
    LostItemController,
    DeclarationController,
    ObjetTrouveController
};

// ========================
// Routes publiques
// ========================
Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ========================
// Authentification
// ========================
require __DIR__ . '/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Redirige vers la page d'accueil
})->name('logout');

// ========================
// Routes liées au profil (authentifié)
// ========================
Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================
// Routes pour les catégories
// ========================
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/{id}/subcategories', [CategoryController::class, 'showSubcategories'])->name('categories.subcategories');
});

// ========================
// Routes pour les sous-catégories
// ========================
Route::prefix('subcategories')->group(function () {
    Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::delete('/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
});

// ========================
// Routes pour les objets perdus
// ========================
Route::prefix('lost-items')->group(function () {
    Route::get('/', [LostItemController::class, 'index'])->name('lost-items.index');
    Route::get('/create', [LostItemController::class, 'create'])->name('lost-items.create');
    Route::post('/', [LostItemController::class, 'store'])->name('lost-items.store');
    Route::get('/createAdmin', [LostItemController::class, 'createAdmin'])->name('lost-items.createAdmin');
    Route::get('/{id}', [LostItemController::class, 'show'])->name('lostItem.detail');
    Route::get('/{id}/edit', [LostItemController::class, 'edit'])->name('lost-items.edit');
    Route::put('/{id}', [LostItemController::class, 'update'])->name('lost-items.update');
Route::delete('/{id}', [LostItemController::class, 'destroy'])->name('lost-items.destroy');
});

// ========================
// Routes pour les objets trouvés
// ========================
Route::prefix('objets-trouves')->group(function () {
    Route::get('/create', [ObjetTrouveController::class, 'create'])->name('objets_trouves.create');
    Route::post('/', [ObjetTrouveController::class, 'store'])->name('objets_trouves.store');
    Route::get('/similar/{categorie_id}', [ObjetTrouveController::class, 'similar'])->name('objets_trouves.similar');
    Route::get('/mes-objets', [ObjetTrouveController::class, 'myObjects'])->name('objets_trouves.my_objects');
    Route::delete('/{id}', [ObjetTrouveController::class, 'destroy'])->name('objets_trouves.destroy');
});

// ========================
// Routes admin protégées
// ========================
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', fn () => view('admin'))->name('admin');
});

// ========================
// Routes API (ex. récupération des sous-catégories dynamiquement)
// ========================
Route::prefix('api')->group(function () {
    Route::get('/subcategories/{categoryId}', function ($categoryId) {
        return App\Models\Subcategory::where('category_id', $categoryId)->get();
    });
});

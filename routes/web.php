<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    ProfileController,
    CategoryController,
    SubcategoryController,
    LostItemController,
    DeclarationController,
    ObjetTrouveController,
    UserController,
    FoundItemController
};

// ========================
// Routes publiques
// ========================
Route::get('/', [LostItemController::class, 'showByCategory'])->name('home');
Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ========================
// Authentification
// ========================
require __DIR__ . '/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
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
// Routes pour les catégories et sous-catégories
// ========================
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/{id}/subcategories', [CategoryController::class, 'showSubcategories'])->name('categories.subcategories');
});

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
    Route::get('/{id}', [LostItemController::class, 'show'])->name('lost-items.show');
    Route::get('/{id}/edit', [LostItemController::class, 'edit'])->name('lost-items.edit');
    Route::put('/{id}', [LostItemController::class, 'update'])->name('lost-items.update');
    Route::delete('/{id}', [LostItemController::class, 'destroy'])->name('lost-items.destroy');
});

// ========================
// Routes pour les objets trouvés
// ========================
Route::prefix('found-items')->group(function () {
Route::get('/create', [FoundItemController::class, 'create'])->name('found-items.create');
Route::post('/', [FoundItemController::class, 'store'])->name('found-items.store');
Route::get('/', [FoundItemController::class, 'index'])->name('found-items.index');
Route::get('/createAdmin', [FoundItemController::class, 'createAdmin'])->name('found-items.createAdmin');
Route::get('/{id}/edit', [FoundItemController::class, 'edit'])->name('found-items.edit');
Route::put('/{id}', [FoundItemController::class, 'update'])->name('found-items.update');
Route::delete('/{id}', [FoundItemController::class, 'destroy'])->name('found-items.destroy');
Route::get('/liste', [FoundItemController::class, 'liste'])->name('found-items.liste');
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

// ========================
// Routes pour la gestion des utilisateurs
// ========================
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/deleted', [UserController::class, 'deleted'])->name('users.deleted');
    Route::put('/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
});


Route::get('/redirect-after-login', [UserController::class, 'redirectAfterLogin'])->name('redirect.after.login');


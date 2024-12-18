<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;

Route::middleware('guest')->group(function () {
    // Route d'inscription
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Route de connexion
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // Route de déconnexion
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});








Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\CategoryController;

// Route pour afficher le formulaire
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Route pour soumettre le formulaire
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');




use App\Http\Controllers\SubcategoryController;

// Route pour afficher le formulaire
Route::get('/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');

// Route pour soumettre le formulaire
Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');



use App\Http\Controllers\LostItemController;

// Route pour afficher le formulaire de déclaration
Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost-items.create');

// Route pour soumettre la déclaration
Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost-items.store');




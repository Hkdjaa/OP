<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/api/subcategories/{categoryId}', function($categoryId) {
    return App\Models\Subcategory::where('category_id', $categoryId)->get();
});


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




use App\Models\Subcategory;

Route::get('/subcategories/{category}', function ($categoryId) {
    return Subcategory::where('category_id', $categoryId)->get();
});



Route::get('/api/subcategories/{categoryId}', function($categoryId) {
    return App\Models\Subcategory::where('category_id', $categoryId)->get();
});
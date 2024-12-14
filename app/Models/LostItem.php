<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date_lost', 'location', 'category_id', 'subcategory_id', 'phone_number'];

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation avec la sous-catégorie
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
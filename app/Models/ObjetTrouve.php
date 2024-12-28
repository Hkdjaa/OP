<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetTrouve extends Model
{
    use HasFactory;

    protected $table = 'objets_trouves';

    protected $fillable = [
        'nom_objet',
        'categorie_id',
        'lieu_trouve',
        'date_trouvee',
        'description',
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }
}

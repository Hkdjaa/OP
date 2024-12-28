<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetsTrouvesTable extends Migration
{
    public function up()
    {
        Schema::create('objets_trouves', function (Blueprint $table) {
            $table->id();
            $table->string('nom_objet');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->string('lieu_trouve');
            $table->date('date_trouvee');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('objets_trouves');
    }
}

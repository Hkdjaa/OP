<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID de l'utilisateur qui déclare
            $table->string('phone_number'); // Champ pour le numéro de téléphone
            $table->string('description'); // Description de l'objet
            $table->string('place'); // Lieu où l'objet a été perdu
            $table->date('date_lost'); // Date de la perte
            $table->string('photo')->nullable(); // Champ pour la photo de l'objet (optionnel)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_items');
    }
};

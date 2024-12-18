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
            $table->id(); // Identifiant unique pour chaque objet perdu
            $table->string('name'); // Nom de l'objet perdu
            $table->text('description'); // Description détaillée
            $table->date('date_lost'); // Date de la perte
            $table->string('place'); // Lieu où l'objet a été perdu
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table des catégories
            $table->foreignId('subcategory_id')->nullable()->constrained()->onDelete('cascade'); // Clé étrangère vers la table des sous-catégories
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table des utilisateurs
            $table->string('phone_number', 15); // Numéro de téléphone pour contacter le déclarant
            $table->string('photo')->nullable(); // Chemin vers la photo de l'objet (optionnel)
            $table->timestamps(); // Champs pour `created_at` et `updated_at`
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

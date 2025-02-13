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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable(); // ID du créateur
            $table->unsignedBigInteger('updated_by')->nullable(); // ID de celui qui a modifié
            $table->unsignedBigInteger('deleted_by')->nullable(); // ID de celui qui a supprimé
            $table->softDeletes(); // Ajoute la colonne deleted_at pour le "soft delete"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by', 'deleted_at']);
        });
    }
};

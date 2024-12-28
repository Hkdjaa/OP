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
    Schema::table('objets_trouves', function (Blueprint $table) {
        $table->string('photo')->nullable()->after('description');
    });
}

public function down()
{
    Schema::table('objets_trouves', function (Blueprint $table) {
        $table->dropColumn('photo');
    });
}

};
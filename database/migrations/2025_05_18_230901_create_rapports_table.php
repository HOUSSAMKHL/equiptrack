<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->dateTime('date_de_generation');
            $table->string('statut');
            $table->foreignId('id_user')->constrained('utilisateurs');
            $table->string('fichier_path')->nullable(); // Champ pour stocker le chemin du fichier
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports');
    }
};
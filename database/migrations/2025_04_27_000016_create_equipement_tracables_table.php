<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipement_tracables', function (Blueprint $table) {
            $table->id(); 
            $table->string('statut');
            $table->string('reference');
            $table->year('annee_dacquisition');
            $table->float('valeur_dacquisition');
            $table->foreignId('id_atelier')->constrained('ateliers')->onDelete('cascade');
            $table->foreignId('id_equipement')->constrained('equipement_identifies')->onDelete('cascade');
            $table->foreignId('id_frequence')->constrained('frequences')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement_tracables');
    }
};

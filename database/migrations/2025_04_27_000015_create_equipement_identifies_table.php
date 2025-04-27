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
        Schema::create('equipement_identifies', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom_equipement');
            $table->string('secteur');
            $table->foreignId('id_categorie')->constrained('categories');
            $table->foreignId('id_frequence')->constrained('frequences');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement_identifiés');
    }
};

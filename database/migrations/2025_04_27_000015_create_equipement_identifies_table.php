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
            $table->enum('secteur', ['Mécanique', 'Électrique', 'Hydraulique', 'Découpe', 'Usinage']);
            $table->integer('quantite')->default(1); // Ajout de la colonne quantite
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade');
            $table->foreignId('id_etablissement')->constrained('efps')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement_identifies');
    }
};

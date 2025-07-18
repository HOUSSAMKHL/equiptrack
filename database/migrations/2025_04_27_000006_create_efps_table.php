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
        Schema::create('efps', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom_etablissement');
            $table->string('adresse');
            $table->string('numero');
            $table->string('email');
            $table->foreignId('id_complexe')->constrained('complexes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('efps');
    }
};

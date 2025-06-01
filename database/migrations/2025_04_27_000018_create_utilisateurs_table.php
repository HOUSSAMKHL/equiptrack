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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom_user');
            $table->integer('age');
            $table->string('telephone');
            $table->string('email');
            $table->string('adresse');
            $table->string('password');
            $table->foreignId('id_roles')->constrained('roles')->onDelete('cascade');
            $table->foreignId('id_DR')->nullable()->constrained('direction_regionales')->onDelete('cascade')->nullable();
            $table->foreignId('id_complexe')->nullable()->constrained('complexes')->onDelete('cascade')->nullable();
            $table->foreignId('id_etablissement')->nullable()->constrained('efps')->onDelete('cascade')->nullable();
            $table->foreignId('id_atelier')->nullable()->constrained('ateliers')->onDelete('cascade')->nullable();
            $table->string('status')->default('actif');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};

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
        Schema::create('effectuer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('id_exemplaire')->constrained('equipement_tracables')->onDelete('cascade');
            $table->foreignId('id_operation')->constrained('operations')->onDelete('cascade');
            $table->date('date_operation');
            $table->integer('durée');
            $table->enum('statut', ['planned', 'in progress','completed'])->default('planned');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effectuer');
    }
};

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
        Schema::create('anomalies', function (Blueprint $table) {
            $table->id(); 
            $table->text('cause_anomalie');
            $table->text('action_corrective');
            $table->dateTime('date_signalement');
            $table->dateTime('date_remise')->nullable();
            $table->integer('duree_panne');
            $table->float('cout_reparation');
            $table->boolean('anomalie_resolue');
            $table->text('pieces_rechange')->nullable();
            $table->string('status')->default('open');
            $table->string('priorite')->default('faible');
            $table->foreignId('id_user')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('id_intervenant')->nullable()->constrained('intervenants')->onDelete('cascade');
            $table->foreignId('id_equipement')->constrained('equipement_tracables')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anomalies');
    }
};
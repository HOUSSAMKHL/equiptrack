<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_operation');
            $table->string('type'); // Hebdomadaire, etc.
            $table->string('equipement');
            $table->date('date');
            $table->string('duree');
            $table->string('intervenant');
            $table->string('statut'); // Planned, In Progress, Resolved
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};

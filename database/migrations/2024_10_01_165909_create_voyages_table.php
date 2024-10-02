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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id(); // Identifiant unique du voyage
            $table->string('titre'); // Titre du voyage
            $table->date('start_date'); // Date de début
            $table->date('end_date'); // Date de fin
            $table->foreignId('destination_id')->constrained()->onDelete('cascade'); // ID de la destination, avec contrainte
            $table->text('details'); // Détails du voyage
            $table->string('image')->nullable(); // Champ pour l'image, nullable pour le rendre facultatif
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};

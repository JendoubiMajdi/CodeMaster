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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de la destination
            $table->string('lieu_visite'); // Lieu visité
            $table->string('region')->nullable(); // Région de la destination
            $table->string('type')->nullable(); // Type de destination (ex: plage, montagne, etc.)
            $table->text('description'); // Description de la destination
            $table->string('image')->nullable(); // Ajoutez cette ligne pour le champ image

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};

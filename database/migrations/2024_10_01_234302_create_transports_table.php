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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['public', 'privé', 'partagé'])->default('public');
            $table->enum('mode', ['bus', 'train', 'avion', 'bateau', 'voiture'])->default('bus');
            $table->decimal('cout', 8, 2);
            $table->time('horaire_depart');
            $table->time('horaire_arrivee');
            $table->boolean('eco_friendly')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};

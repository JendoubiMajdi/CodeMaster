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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_personnes');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->decimal('tarif_total', 8, 2);
            $table->foreignId('chambre_id')->constrained()->onDelete('cascade');
            $table->string('type_chambre')->default('simple');
            $table->timestamps();
                });
            }        
        
            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('reservations');
            }
        };
        
        
        
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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');  
            $table->integer('etage');  
            $table->enum('type', ['simple', 'double']);  
            $table->enum('vue', ['mer', 'foret', 'piscine'])->nullable(); 
            $table->decimal('tarif_simple', 8, 2)->default(100); 
            $table->decimal('tarif_double', 8, 2)->default(150); 
            $table->integer('nombre_nuitees')->default(1);  
            $table->float('tarif_total')->default(0);  
            $table->boolean('reserver')->default(false);
            $table->json('services_choisis')->nullable(); 
            $table->boolean('eco_friendly')->default(false);  
            $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
       
    }
};

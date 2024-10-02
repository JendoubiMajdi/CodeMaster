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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            $table->string('adresse');  
            $table->string('pays');  
            $table->integer('nombre_etages');  
            $table->json('services')->nullable();  
            $table->json('activites')->nullable();  
            $table->timestamps();
        
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

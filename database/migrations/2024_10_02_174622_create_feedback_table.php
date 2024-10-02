<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('username'); // Colonne pour le nom d'utilisateur
            $table->text('message');    // Colonne pour le message
            $table->timestamps();       // Colonnes created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};

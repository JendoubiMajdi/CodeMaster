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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id'); // Changez cela
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('destination');
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->string('image_public_id')->nullable();
            $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};

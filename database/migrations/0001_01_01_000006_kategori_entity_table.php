<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kategori_entity', function (Blueprint $table) {
            // Definisi kolom
            $table->unsignedBigInteger('entity_id'); // Definisikan entity_id
            $table->unsignedBigInteger('kategori_id'); // Definisikan kategori_id

            // Foreign key untuk kategori_id
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            // Primary key gabungan
            $table->primary(['entity_id', 'kategori_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_entity');
    }
};
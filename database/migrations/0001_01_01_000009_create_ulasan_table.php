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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id(); // Primary key auto_increment
            $table->text('komentar');
            $table->decimal('rating', 10, 0);
            $table->dateTime('tanggal_ulasan');
            $table->unsignedBigInteger('id_pengunjung');
            $table->unsignedBigInteger('id_destinasi');

            $table->foreign('id_pengunjung')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_destinasi')->references('id')->on('destinasi_wisata')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
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
        Schema::create('galeri_foto', function (Blueprint $table) {
            $table->id();
            $table->text('url_foto');
            $table->string('keterangan_foto', 255);
            $table->unsignedBigInteger('id_destinasi');

            $table->foreign('id_destinasi')->references('id')->on('destinasi_wisata')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_foto');
    }
};

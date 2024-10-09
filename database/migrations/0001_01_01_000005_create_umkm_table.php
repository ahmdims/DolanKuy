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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm', 255);
            $table->string('jenis_umkm', 255);
            $table->text('deskripsi');
            $table->string('alamat', 255);
            $table->string('kota', 255);
            $table->string('provinsi', 255);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('harga_tiket')->nullable();
            $table->text('fasilitas');
            $table->string('kontak', 255);
            $table->text('foto_profil');
            $table->decimal('rating_rata_rata', 3, 2);
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
        Schema::dropIfExists('umkm');
    }
};

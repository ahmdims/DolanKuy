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
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_destinasi', 255);
            $table->text('deskripsi');
            $table->string('alamat', 255);
            $table->string('kota', 255);
            $table->string('provinsi', 255);
            $table->decimal('latitude', 10, 8); 
            $table->decimal('longitude', 11, 8);
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('harga_tiket');
            $table->string('fasilitas', 255);
            $table->string('kontak', 255);
            $table->integer('rating')->nullable()->change();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};

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
        Schema::create('cultures', function (Blueprint $table) {
            $table->id(); // Biarkan bisa NULL jika tidak selalu ada
            $table->string('slug', 255)->unique();
            $table->string('name', 255);
            $table->string('cultures_type', 255)->nullable();
            $table->text('description');
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->text('facilities');
            $table->string('contact', 255);
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('histories_count')->default(0);
            $table->tinyInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultures');
    }
};

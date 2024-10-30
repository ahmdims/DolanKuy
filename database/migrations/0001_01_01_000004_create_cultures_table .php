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
            $table->id();
            $table->string('slug', 255)->unique();
            $table->string('name', 255);
            $table->text('description');
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('histories_count')->default(0);
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
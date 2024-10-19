<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique();
            $table->string('name', 255);
            $table->string('destinations_type', 255)->nullable();
            $table->text('description');
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->integer('ticket_price')->nullable();
            $table->text('facilities');
            $table->string('contact', 255);
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('histories_count')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('destinations');

        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('view_count');
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('likes_count');
            $table->dropColumn('histories_count');
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
    }
};

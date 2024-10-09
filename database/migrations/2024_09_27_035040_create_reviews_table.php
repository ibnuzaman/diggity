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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->decimal('rating', 2, 1);
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'reviews_user_id_foreign',
            );
            $table->foreignId('course_id')->constrained(
                table: 'courses',
                indexName: 'reviews_course_id_foreign',
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image');
            $table->decimal('discounted_price', 8, 2)->default(0);
            $table->decimal('starting_price', 8, 2);
            $table->decimal('final_price', 8, 2)->nullable();
            $table->integer('subscriber')->default(0);
            $table->enum('level', ['Pemula', 'Menengah', 'Ahli']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

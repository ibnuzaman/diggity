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
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->date('bootcamp_date');
            $table->enum('bootcamp_level', ['Pemula', 'Menengah', 'Ahli']);
            $table->integer('available_seats');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'bootcamps_category_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bootcamps');
    }
};

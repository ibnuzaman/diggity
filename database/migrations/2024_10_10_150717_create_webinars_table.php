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
        Schema::create('webinars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('image')->nullable();
            $table->date('webinar_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('meeting_room');
            $table->decimal('starting_price', 8, 2);
            $table->decimal('discounted_price', 8, 2)->default(0);
            $table->decimal('final_price', 8, 2)->nullable();
            $table->text('description');
            $table->foreignId('category_id')->contrained(
                table: 'categories',
                indexName: 'webinars_category_id_foreign'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
